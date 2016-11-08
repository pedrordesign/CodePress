<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 26/10/16
 * Time: 13:13
 */

namespace CodePress\CodePost\Testing;


use CodePress\CodePost\Models\Post;
use CodePress\CodeUser\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminPostsTest extends \TestCase
{

    use DatabaseTransactions;

    protected function getUser(){
        return factory(User::class)->create();
    }

    public function test_cannot_access_posts()
    {

        $this
            ->visit('/admin/posts')
            ->see('E-Mail Address');

    }

    public function test_can_visit_admin_posts_page()
    {

        $this
            ->actingAs($this->getUser())
            ->visit('/admin/posts')
            ->see('Categories');

    }

    public function test_posts_listing()
    {
        Post::create(['title' => 'Post 7', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 8', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 9', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 10', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 11', 'content' => 'Conteudo do meu post']);


        $this
             ->actingAs($this->getUser())
            ->visit('/admin/posts')
            ->see('Posts')
            ->see('Post 7')
            ->see('Post 8')
            ->see('Post 9')
            ->see('Post 10')
            ->see('Post 11');
    }

    public function test_click_create_new_post()
    {
        $this
             ->actingAs($this->getUser())
            ->visit('admin/posts')
            ->click('Create Post')
            ->seePageIs('/admin/posts/create')
            ->see('Create Post');
    }

    public function test_create_new_post()
    {
        $this
             ->actingAs($this->getUser())
            ->visit('admin/posts/create')
            ->type('Post criado', 'title')
            ->type('Conteudo do post', 'content')
            ->press('Submit')
            ->seePageIs('admin/posts')
            ->see('Post criado')
            ->see('Conteudo do post')
        ;
    }

    public function test_click_edit_a_post()
    {
        $post = Post::create(['title' => 'Post para edit', 'content' => 'Conteudo do meu post']);
        $this
             ->actingAs($this->getUser())
            ->visit("admin/posts/")
            ->click("link_edit_post_$post->id")
            ->seePageIs("/admin/posts/$post->id/edit")
            ->see('Edit Post');
    }

    public function test_update_new_post()
    {
        $post = Post::create(['title' => 'Post para edit', 'content' => 'Conteudo do meu post']);
        $this
             ->actingAs($this->getUser())
            ->visit("admin/posts/{$post->id}/edit")
            ->type('Post Alterado', 'title')
            ->type('Conteudo do post', 'content')
            ->press('Submit')
            ->seePageIs('admin/posts')
            ->see('Post Alterado')
            ->see('Conteudo do post')
        ;
    }

}