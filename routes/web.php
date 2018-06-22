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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login','Auth\LoginController@postLogin');


Route::post('/admin/login','AdminAuth\LoginController@postLogin');
Route::get('/admin/login','AdminAuth\LoginController@showLoginForm');
Route::get('/admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin/register', 'AdminAuth\RegisterController@register');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {

    Route::get('/', 'Admin\HomeController@index');
    Route::get("/user",'Admin\UserController@index');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
