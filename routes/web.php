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


Route::get('/', 'PostController@index')->middleware('auth');
Route::get('/posts/create','PostController@create');
Route::get('/posts/{post}/edit','PostController@edit');
Route::put('/posts/{post}','PostController@update');
Route::get('/posts/{post}','PostController@show');
Route::get('/posts/{post}/review','PostController@review');
Route::post('/posts','PostController@store');
Route::post('/posts/{post}','PostController@store2');
Route::delete('/posts/{post}','PostController@delete');
Route::post('/shops','ShopController@store');
Route::get('/shops/create','ShopController@create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
