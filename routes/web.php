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

Route::get('/', "IndexController@index");
Route::get('index/wel', "IndexController@wel");
Route::post('index/push_comment', "IndexController@push_comment");
Route::post('index/get_comment', "IndexController@get_comment");
Route::post('index/push_status', "IndexController@push_status");
Route::get('index/get_status', "IndexController@get_status");
Route::get('index/get_hello', "IndexController@get_hello");
