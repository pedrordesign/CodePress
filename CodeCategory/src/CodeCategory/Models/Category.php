<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 22/09/16
 * Time: 20:59
 */

namespace CodePress\CodeCategory\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'codepress_categories';

    protected $fillable = [
        'name',
        'active',
        'parent_id'
    ];

}