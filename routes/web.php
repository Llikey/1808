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

// 登录
Route::get('/login', 'Index\LoginController@login');
Route::get('/captcha', 'Index\LoginController@captcha');
Route::post('/verification', 'Index\LoginController@verification');
Route::post('/hh', 'Index\LoginController@hh');

Route::get('/text/{id}', 'Index\LoginController@text');

// 首页
Route::get('/index', 'Index\IndexController@index');

/**
 * 后台首页
 */
Route::get('/admin/index', 'Admin\IndexController@index')->middleware('Base');   // 首页
Route::get('/admin/login', 'Admin\LoginController@login');   // 登录
Route::match(['get', 'post'], '/admin/logincheck', 'Admin\LoginController@logincheck');   // 登录验证
Route::get('/admin/loginOut', 'Admin\LoginController@loginOut');   // 退出登录
Route::get('/admin/welcome', 'Admin\IndexController@welcome')->middleware('Base');
Route::get('/admin/userinfo', 'Admin\userinfoController@userinfo')->middleware('Base'); // 显示用户信息
Route::match(['get', 'post'], '/admin/setuserinfo', 'Admin\userinfoController@setuserinfo')->middleware('Base'); // 获取用户信息
