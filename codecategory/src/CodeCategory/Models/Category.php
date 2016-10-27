<?php

namespace CodePress\CodeCategory\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class Category extends Model
{

    use Sluggable;

    protected $table = 'codepress_categories';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'build_from' => 'name',
                'save_to'    => 'slug',
                'unique'     => true
            ]
        ];
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function categorizable(){
        return $this->morphTo();
    }

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'parent_id'
    ];

    private $validator;

    /**
     * @param $validator
     */
    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;

    }

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}