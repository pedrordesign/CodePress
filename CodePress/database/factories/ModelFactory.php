<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use CodePress\CodeCategory\Models\Category;
use CodePress\CodePost\Models\Comment;
use CodePress\CodePost\Models\Post;
use CodePress\CodeUser\Models\User;

$factory->define(User::class, function (Faker\Generator $faker){
    return [
        'name' => 'user',
        'email' => 'email@user.com.br',
        'password' => bcrypt(123456),
        'active' => true,
        'remember_token' => str_random(10)
    ] ;
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'active' => true
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph
    ];
});

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->paragraph
    ];
});