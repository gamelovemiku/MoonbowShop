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

Route::get('/auth', function () {
    return view('Authentication');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/redeem', function () {
    return view('redeem');
});

Route::get('/statistics', function () {
    return view('statistics');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/testrcon', 'SendCommandController@index');