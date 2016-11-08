<?php

use CodePress\CodeUser\Facade\Route as CustomRouter;

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

CustomRouter::auth();
//Route::auth();
//Auth::routes();


Route::get('/home', 'HomeController@index');

