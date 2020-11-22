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
    Route::get('/articles/{slug}', 'BlogController@show')->name('articles.show');
    Route::get('/article/{slug}', 'ArticleController@show')->name('article.show');
    Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');//должны быть статьи по выбранной категории {slug}
    Route::get('/tag/{slug}', 'TagController@show')->name('tags.show');
    Route::get('/search', 'SearchController@index')->name('search');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
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





