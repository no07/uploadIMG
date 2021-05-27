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

Route::get('/','ImageUploadController@fileCreate');
Route::post('image/upload/store','ImageUploadController@fileStore');
Route::post('image/delete','ImageUploadController@fileDestroy');
Route::get('list','ImageUploadController@index')->name('form.index');
