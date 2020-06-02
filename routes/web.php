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

// Route::get('/', function () {
//     return view('welcome');
// });

//团队开发首页
Route::view('/','team/index');

//客户模块
Route::prefix('client')->group(function(){
	//展示页面
	Route::get('/','ClientController@index');
	//添加页面
	Route::get('create','ClientController@create');
	//执行添加
	Route::post('store','ClientController@store');
	//修改页面
	Route::get('edit/{id}','ClientController@edit');
	//执行修改
	Route::post('update/{id}','ClientController@update');
	//删除
	Route::get('destroy/{id}','ClientController@destroy');
});
