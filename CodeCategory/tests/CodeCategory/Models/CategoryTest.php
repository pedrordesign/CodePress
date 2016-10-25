<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 22/09/16
 * Time: 21:55
 */

namespace CodePress\CoteCategory\Tests\Models;


use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Tests\AbstractTestCase;

class CategoryTest extends AbstractTestCase
{
    public function SetUp(){
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_a_category_can_be_persisted(){

        $category = Category::create(['name'=>'Category Test', 'active' => true]);
        $this->assertEquals('Category Test', $category->name);

        $category = Category::all()->first();
        $this->assertEquals('Category Test', $category->name);

    }

    public function test_check_if_can_assign_a_parent_to_a_category(){

        $parentCategory = Category::create(['name'=>'Parent Test', 'active' => true]);

        $category = Category::create(['name'=>'Category Test', 'active' => true]);

        $category->parent()->associate($parentCategory)->save();

        $child = $parentCategory->children->first();

        $this->assertEquals('Category Test', $child->name);

        $this->assertEquals('Parent Test', $category->parent->name);

    }

}