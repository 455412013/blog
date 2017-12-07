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

//\Illuminate\Support\Facades\App::bind("App\Billing\Stripe",function (){
//   return new App\Billing\Stripe(config('services.stripe.secret'));
//});


//
//App::instance('App\Billing\Stripe',$stripe);
//
//
//$stripe=\Illuminate\Support\Facades\App::make('App\Billing\Stripe');
//dd($stripe);


//dd(resolve(\App\Billing\Stripe::class));



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

Route::get('sendEmail',function(){
    \Illuminate\Support\Facades\Mail::to('455412013@qq.com')->send(new \App\Mail\Welcome());
});