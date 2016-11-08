<?php

//use CodePress\CodeUser\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

$router = new \CodePress\CodeUser\Routing\Router();
$router->auth();
//Route::auth();
//Auth::routes();


