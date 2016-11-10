<?php

use CodePress\CodeCategory\Models\Category;
use CodePress\CodePost\Models\Comment;
use CodePress\CodePost\Models\Post;
use CodePress\CodeUser\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user1 = factory(User::class)->make();
        $user2 = factory(User::class)->make(['name' => 'admin', 'email' => 'user2@app.com']);
        $user1->save();
        $user2->save();
        factory(Category::class, 5)->create();
        factory(Post::class, 10)->create()->each(function ($post){
           foreach (range(1, 10) as $value) {
               $post->comments()->save(factory(Comment::class)->make());
           }
        });

        factory(Post::class, 10)->create()->each(function ($post){
            foreach (range(1, 10) as $value) {
                $post->comments()->save(factory(Comment::class)->make());
            }
        });

        $this->command->info("Finished Seeders!");

    }
}
