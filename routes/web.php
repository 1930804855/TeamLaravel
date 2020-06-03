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

Route::view('/','team/index')->middleware('login');

/**管理员*/
Route::prefix('admin')->middleware('login')->group(function(){
    Route::get('/index','Admin\AdminController@index');  //展示
    Route::get('create','Admin\AdminController@create');  //添加
    Route::post('store','Admin\AdminController@store');   //执行添加
    Route::get('edit/{id}','Admin\AdminController@edit');  //修改视图
    Route::post('update/{id}','Admin\AdminController@update');  //执行修改
    Route::get('destroy/{id}','Admin\AdminController@destroy');  //删除

});

   Route::get('/login','LoginController@index');
   Route::post('/logindo','LoginController@logindo')->middleware('login');
   Route::get('/loginout','LoginController@loginout')->middleware('login');



//业务员
Route::prefix('salesman')->middleware('login')->group(function () {
	Route::get('create','SalesmanController@create');
	Route::post('store','SalesmanController@store');
	Route::get('/index','SalesmanController@index');
	Route::get('destroy/{id}','SalesmanController@destroy');
	Route::get('edit/{id}','SalesmanController@edit');
	Route::post('update/{id}','SalesmanController@update');
	
});

//拜访会议
Route::prefix('meeting')->middleware('login')->group(function () {
	Route::get('create','MeetingController@create');
	Route::post('store','MeetingController@store');
	Route::get('/index','MeetingController@index');
	Route::get('destroy/{id}','MeetingController@destroy');
	Route::get('edit/{id}','MeetingController@edit');
	Route::post('update/{id}','MeetingController@update');
});	


//客户模块
Route::prefix('client')->middleware('login')->group(function(){
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
Route::prefix('demand')->middleware('login')->group(function(){
	//客户信息查询
	Route::get('/','DemandController@client');
	//拜访会议查询
	Route::get('meeting','DemandController@meeting');
});
