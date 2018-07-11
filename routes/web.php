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

use HelperUtils\DateHelper\DateHelper;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/builtDate', function () {

	return \App\Models\SystemMenu1::builtTree2();

});

Route::get('/builtDateUseCode', function () {
	$menu   = new \App\Models\XqyJxsSpecificKnowledge();
	$new    = $menu->filterData();
	//使用递归遍历树
	//return \App\Models\XqyJxsSpecificKnowledge::builtTree($new, 0);

	//使用引用遍历树
	return \App\Models\XqyJxsSpecificKnowledge::builtTree2($new, 0);

});

Route::get('/menus', 'Admin\MenuController@index');

Route::post('/login', 'Auth\LoginController@postLogin');


Route::post('/admin/login', 'AdminAuth\LoginController@postLogin');
Route::get('/admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::get('/admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin/register', 'AdminAuth\RegisterController@register');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

	Route::get('/', 'Admin\HomeController@index');
	Route::get("/user", 'Admin\UserController@index');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
