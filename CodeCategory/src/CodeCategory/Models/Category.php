<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 22/09/16
 * Time: 20:59
 */

namespace CodePress\CodeCategory\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

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

    public function categorizable(){
        return $this->morphTo();
    }

    protected $fillable = [
        'name',
        'slug',
        'active',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}