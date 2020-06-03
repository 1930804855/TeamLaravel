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
   Route::post('/logindo','LoginController@logindo');
   Route::get('/loginout','LoginController@loginout');

