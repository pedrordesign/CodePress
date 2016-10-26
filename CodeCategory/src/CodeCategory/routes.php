<?php

Route::group(['prefix' => 'categories', 'namespace'=>'CodePress\CodeCategory\Controllers'], function(){

    Route::get('test', 'AdminCategoriesController@index');

});