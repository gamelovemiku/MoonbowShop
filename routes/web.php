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

Route::get('/redeem', function () {
    return view('redeem');
});

Route::get('/statistics', 'StatisticsController@index');


Route::get('/checkout', 'CheckoutController@index');

Route::get('/testrcon/{cmd}', 'SendCommandController@sendCommand');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Auth::routes();

Route::get('/testrcon/{cmd}', 'SendCommandController@sendCommand');

Route::get('/store', 'StoreController@index')->name('store');

Route::get('/checkout', 'CheckoutController@index');
Route::get('/checkout/{id}', 'CheckoutController@buy')->name('buy');
Route::get('/checkout/{id}/{playername}', 'CheckoutController@confirmbuy')->name('comfirmed_buy');
