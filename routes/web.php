<?php

use Illuminate\Http\Request;
use App\Itemshop;

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

Route::get('/testrcon/{cmd}', 'Controller@sendCommand'); //<-------------------------------------- DELETE THIS WHEN RELEASE

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Auth::routes();

Route::get('/store', 'StoreController@index')->name('store');

Route::get('/store/checkout', 'CheckoutController@index');
Route::post('/store/checkout', 'CheckoutController@verifiedbuy')->name('verifiedbuy');

Route::get('/store/checkout/{id}', 'CheckoutController@buy')->name('buy');

Route::post('/redeem', 'RedeemController@redeem')->name('redeem');

Route::get('/topup', 'TopupController@index')->name('topup');

Route::get('/manage/changepassword', function () {
    return view('manage.changepassword');
});

Route::get('/manage', function () {
    return redirect(route('profile.index'));
});

Route::get('/manage/profile', 'Management\ManageProfileController@index')->name('profile.index');

Route::resource('/manage/itemshop/item', 'Management\ManageItemController');

Route::resource('/manage/itemshop/category', 'Management\ManageCategoryController');

Route::post('/upload', 'Management\ManageItemController@upload')->name('item.upload');

Route::get('/paypal', function () {
    return view('paypal');
});

Route::get('/manage/commandsender', 'Management\ManageCommandSenderController@index')->name('commandsender');
Route::post('/manage/commandsender', 'Management\ManageCommandSenderController@store')->name('commandsender.query');

Route::resource('/manage/usereditor', 'Management\ManageUserController');

Route::post('/manage/usereditor/{id}/ban', 'Management\ManageUserController@ban')->name('usereditor.ban');

Route::get('/manage/recyclebin', 'Management\ManageRecycleBinController@index')->name('recyclebin.index');
Route::post('/manage/recyclebin/user/{id}/rollback', 'Management\ManageRecycleBinController@rollbackUser')->name('recyclebin.rollbackUser');
Route::post('/manage/recyclebin/user/{id}/forcedelete', 'Management\ManageRecycleBinController@forcedeleteUser')->name('recyclebin.forcedeleteUser');

Route::post('/manage/recyclebin/itemshop/{id}/rollback', 'Management\ManageRecycleBinController@rollbackItemshop')->name('recyclebin.rollbackItemshop');
Route::post('/manage/recyclebin/itemshop/{id}/forcedelete', 'Management\ManageRecycleBinController@forcedeleteItemshop')->name('recyclebin.forcedeleteItemshop');

//Route::post('/manage/commandsender', 'Management\ManageCommandSenderController')->name('manage.commandsender.send');

Route::get('/test', function () {

    $item = Itemshop::find(2)->category;

    return $item;
});
