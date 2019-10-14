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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'ProductController@show')->name('products.show');
Route::get('/product', 'ProductController@index')->name('products.index');
Route::get('/product/crear', 'ProductController@create')->name('products.create');
Route::post('/product/store', 'ProductController@store')->name('products.store');
Route::post('/product/orden', 'ProductController@orden')->name('products.orden');