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
//业务员
Route::prefix('salesman')->group(function () {
	Route::get('create','SalesmanController@create');
	Route::post('store','SalesmanController@store');
	Route::get('/index','SalesmanController@index');
	Route::get('destroy/{id}','SalesmanController@destroy');
	Route::get('edit/{id}','SalesmanController@edit');
	Route::post('update/{id}','SalesmanController@update');
	
});

//拜访会议
Route::prefix('meeting')->group(function () {
	Route::get('create','MeetingController@create');
	Route::post('store','MeetingController@store');
	Route::get('/index','MeetingController@index');
	Route::get('destroy/{id}','MeetingController@destroy');
	Route::get('edit/{id}','MeetingController@edit');
	Route::post('update/{id}','MeetingController@update');
});	


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

//综合查询
Route::prefix('demand')->group(function(){
	//客户信息查询
	Route::get('/','DemandController@client');
	//拜访会议查询
	Route::get('meeting','DemandController@meeting');
});
