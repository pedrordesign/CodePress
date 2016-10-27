<?php

namespace CodePress\CodeTag\Models;


use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use Taggable;

    protected $table = 'codepress_tags';


    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'active'
    ];


}