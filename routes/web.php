<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Blog'], function () {
    Route::get('/', 'BlogController@index')->name('home');
    Route::get('/article', 'BlogController@show')->name('article.show');
    Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');//должны быть статьи по выбранной категории {slug}
    Route::get('/tag', 'TagController@show')->name('tags.single');
    Route::get('/search', 'SearchController@index')->name('search');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/articles', 'ArticleController');
});

Route::group(['namespace' => 'User'], function (){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
    Route::get('/logout', 'UserController@logout')->name('logout');
});





