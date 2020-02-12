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

use Illuminate\Support\Facades\Route;

Route::get('/',"PagesController@root")->name("root");

Auth::routes(['verify'=>true]);//用户认证路由（vendor/laravel/framework/src/Illuminate/Routing/Router.php）搜索LoginController

Route::resource("users","UsersController",['only'=>['show','update','edit']]);


Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get("topics/{topic}/{slug?}",'TopicsController@show')->name("topics.show");

Route::resource('categories','CategoriesController',['only'=>['show']]);

Route::post('upload_image','TopicsController@uploadImage')->name("topics.upload_image");
