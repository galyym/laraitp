<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'StaticController@index');
Route::get('/about-us', 'StaticController@about');

Route::resource('article', 'ArticlesController');
