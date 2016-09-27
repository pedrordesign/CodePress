<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 22/09/16
 * Time: 21:55
 */

namespace CodePress\testando\Tests\Models;


use CodePress\testando\Models\Category;
use CodePress\testando\Tests\AbstractTestCase;

class CategoryTest extends AbstractTestCase
{
    public function SetUp(){
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_a_category_can_be_persisted(){

        $category = Category::create(['name' => 'category test', 'active' => true]);

        $this->assertEquals('category test', $category->name);

    }
}