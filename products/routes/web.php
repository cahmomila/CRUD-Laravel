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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');
Route::get('/user/{id}/edit', 'UserController@edit')->name('edit');
Route::post('/user/{id}/edit', 'UserController@update')->name('update');
Route::get('/user/{id}/show', 'UserController@show')->name('show');
Route::delete('/user/{id}/delete', 'UserController@destroy')->name('delete');
