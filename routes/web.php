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

Route::get('/', 'Toilettencontroller@index')->name('home');
Route::get('/toilet/{id}', 'Toilettencontroller@detail')->name('detail');
Route::post('/toilet/review/post/{id}', 'ReviewController@save')->name('reviewPost');
Route::get('/all/{column}', 'Toilettencontroller@sort')->name('sort');
Route::get('/new', 'Toilettencontroller@create')->name('newToilet');
Route::post('/new/save', 'ToilettenController@save')->name('saveNewToilet');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/{id}', 'AdminController@edit')->name('adminEdit');
Route::post('/admin/update/{id}', 'AdminController@update')->name('adminUpdate');




