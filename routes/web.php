<?php

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

Auth::routes();

Route::get('/', 'ArticleController@index');
Route::middleware('auth')->get('/article/create', 'ArticleController@create');
Route::post('/article' , 'ArticleController@store')->name('article.store');
Route::get('/article/{article}' , 'ArticleController@show')->name('article.show');
Route::get('/article/{article}/edit' , 'ArticleController@edit')->name('article.edit');
Route::patch('/article/{article}' ,'ArticleController@update')->name('article.update');
Route::get('/article/category/{category}' , 'CategoryController@index')->name('category.index');;

Route::post('/article/{article}/comment' , 'CommentController@store')->name('comment.store');

Route::get('/category/create' , 'CategoryController@create')->name('category.create');
Route::post('/category' , 'CategoryController@store')->name('category.store');

