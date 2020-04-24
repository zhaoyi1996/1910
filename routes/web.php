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
// 闭包路由
// Route::get('/aa', function () { 
//     echo 123;
// });
// 控制器路由
// Route::get('/index','IndexController@index');
// Route::post('/Doadd','IndexController@Doadd');
// 传参
// 必填参数
// Route::get('/goods/{id}', function ($id) { 
//     return $id;
// });
// Route::get('/goods/{id}','IndexController@goods');
// Route::get('/goods/{id}/{name}','IndexController@good');

// 可选参数
// Route::get('/goods/{id?}/{name?}','IndexController@good')->where('id','\d*');
// 混合参数
// Route::get('/goods/{id}/{name?}','IndexController@hun')->where('name','[\x{4e00}-\x{9fa5}]*');

// 后台品牌管理
Route::prefix('/brand')->middleware('auth')->group(function(){
    Route::get('create','Admin\BrandController@create');//添加
    Route::post('store','Admin\BrandController@store');//执行添加
    Route::get('/','Admin\BrandController@index');//展示
    Route::get('destroy/{id}','Admin\BrandController@destroy');//删除
    Route::get('edit/{id}','Admin\BrandController@edit');//编辑展示
    Route::post('update/{id}','Admin\BrandController@update');//执行更新
});

// 后台分类管理
Route::prefix('/cate')->middleware('auth')->group(function(){
    Route::get('/','Admin\CateController@index');//展示
    Route::get('create','Admin\CateController@create');//添加
    Route::post('store','Admin\CateController@store');//执行添加
    Route::get('destroy/{id}','Admin\CateController@destroy');//删除
    Route::get('edit/{id}','Admin\CateController@edit');//编辑展示
    Route::post('update/{id}','Admin\CateController@update');//执行更新
});
// 后台商品管理
Route::prefix('/shop')->middleware('auth')->group(function(){
    Route::get('/','Admin\ShopController@index');//展示
    Route::get('create','Admin\ShopController@create');//添加
    Route::post('store','Admin\ShopController@store');//执行添加
    Route::get('destroy/{id}','Admin\ShopController@destroy');//删除
    Route::get('edit/{id}','Admin\ShopController@edit');//编辑展示
    Route::post('update/{id}','Admin\ShopController@update');//执行更新
});
// 后台用户管理
Route::prefix('/user')->middleware('auth')->group(function(){
    Route::get('/','Admin\UserController@index');//展示
    Route::get('create','Admin\UserController@create');//添加
    Route::post('store','Admin\UserController@store');//执行添加
    Route::get('destroy/{id}','Admin\UserController@destroy');//删除
    Route::get('edit/{id}','Admin\UserController@edit');//编辑展示
    Route::post('update/{id}','Admin\UserController@update');//执行更新
});
// 后台友情链接管理
Route::prefix('/hotlink')->middleware('auth')->group(function(){
    Route::get('/','Admin\HotlinkController@index');//展示
    Route::get('create','Admin\HotlinkController@create');//添加
    Route::post('store','Admin\HotlinkController@store');//执行添加
    Route::get('destroy/{id}','Admin\HotlinkController@destroy');//删除
    Route::get('edit/{id}','Admin\HotlinkController@edit');//编辑展示
    Route::post('update/{id}','Admin\HotlinkController@update');//执行更新
});
// 后台登录
Route::get('/login','Admin\LoginController@create');
Route::post('/login/loginDo','Admin\LoginController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// 前台
Route::get('/ ','Index\IndexController@index');
