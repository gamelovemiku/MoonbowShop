<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/statistics', 'StatisticsController@index');

Route::get('/home', 'HomeController@index');

Route::get('/checkout', 'CheckoutController@index');

Route::get('/testrcon/{cmd}', 'SendCommandController@sendCommand');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Auth::routes();

Route::get('/testrcon/{cmd}', 'Controller@sendCommand');

Route::get('/store', 'StoreController@index')->name('store');

Route::get('/store/checkout', 'CheckoutController@index');
Route::post('/store/checkout', 'CheckoutController@verifiedbuy')->name('verifiedbuy');

Route::get('/store/checkout/{id}', 'CheckoutController@buy')->name('buy');

Route::post('/redeem', 'RedeemController@redeem')->name('redeem');

Route::get('/topup', 'TopupController@index')->name('topup');

Route::get('/manage/changepassword', function () {
    return view('manage.changepassword');
});

Route::get('/manage/profile', function () {
    return view('manage.profile');
});

Route::resource('/manage/itemshop/item', 'Management\ManageItemController');

Route::resource('/manage/itemshop/category', 'Management\ManageCategoryController');

Route::get('/test', 'CheckoutController@takeMoney');

Route::post('/upload', 'Management\ManageItemController@upload')->name('item.upload');;