<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 26/10/16
 * Time: 13:13
 */

namespace CodePress\CodePost\Testing;


use CodePress\CodePost\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminPostsTest extends \TestCase
{

    use DatabaseTransactions;

    public function test_can_visit_admin_posts_page()
    {

        $this->visit('/admin/posts')
        ->see('Posts');

    }

    public function test_posts_listing()
    {
        Post::create(['title' => 'Post 7', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 8', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 9', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 10', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 11', 'content' => 'Conteudo do meu post']);


        $this->visit('/admin/posts')
            ->see('Posts')
            ->see('Post 7')
            ->see('Post 8')
            ->see('Post 9')
            ->see('Post 10')
            ->see('Post 11');
    }

    public function test_click_create_new_button()
    {
        $this->visit('admin/posts')
            ->click('Create Post')
            ->seePageIs('/admin/posts/create')
            ->see('Create Post');
    }
/*
    public function test_create_new_button()
    {
        $this->visit('admin/posts/create')
            ->type('Post Test', 'title')
            ->press('Create Post')
            ->seePageIs('admin/posts')
            ->see('Post Test')
        ;
    }*/

}