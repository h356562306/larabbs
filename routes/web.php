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

Route::get('/',"PagesController@root")->name("root");

Auth::routes(['verify'=>true]);//用户认证路由（vendor/laravel/framework/src/Illuminate/Routing/Router.php）搜索LoginController


