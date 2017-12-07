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

Route::get('/','PostsController@index')->name('home');
Route::get('/','PostsController@index');
//Route::get('/posts/show','PostsController@show');


Route::resource('posts','PostsController');
Route::post('posts/{post}/comments','CommentsController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');


Route::get('/login','SessionController@create')->name('login');

//提交登陆表单
Route::post('/login','SessionController@store');
//注销
Route::get('/logout','SessionController@destroy');
