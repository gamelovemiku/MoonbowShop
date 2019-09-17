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

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->back();
});

Auth::routes();

Route::get('/store', 'StoreController@index')->name('store');

Route::get('/store/checkout', 'CheckoutController@index');
Route::post('/store/checkout', 'CheckoutController@verifiedbuy')->name('verifiedbuy');

Route::get('/store/checkout/{id}', 'CheckoutController@buy')->name('buy');

Route::post('/redeem', 'RedeemController@redeem')->name('redeem');

Route::resource('topup', 'TopupController');

Route::get('/manage', function () {
    return redirect(route('profile.index'));
});

Route::get('/paypal', function () {
    return view('paypal');
});

Route::any('/omise', function () {
    abort(403);
});

Route::post('/omise', 'Payment\PaymentOmiseController@checkout')->name('paymentgateway.omise');

Route::prefix('/player')->group(function () {

    Route::get('/', 'Management\ManageProfileController@index')->name('profile.index');
    Route::resource('profile', 'Management\ManageProfileController');
    Route::resource('topicmanager', 'Management\ManageTopicsController');
    Route::get('changepassword', 'Management\ManageProfileController@changepassword')->name('profile.changepassword');
    Route::get('editprofile', 'Management\ManageProfileController@editprofile')->name('profile.editprofile');
    Route::post('updateprofile', 'Management\ManageProfileController@updateprofile')->name('profile.updateprofile');

    Route::resource('history', 'Management\ManageHistoryController');

});

Route::get('admin/controlpanel', 'Management\ManageDashboardController@index')->name('admin.controlpanel');

Route::prefix('admin/controlpanel')->group(function () {

    Route::resource('notice', 'Management\ManageNoticeController');

    Route::resource('itemshop/item', 'Management\ManageItemController');
    Route::resource('itemshop/category', 'Management\ManageCategoryController');

    Route::resource('dashboard', 'Management\ManageDashboardController');

    Route::resource('paymentplan', 'Management\ManagePaymentPlanController');

    Route::resource('settings', 'Management\ManageGeneralSettingsController');

    Route::get('commandsender', 'Management\ManageCommandSenderController@index')->name('commandsender');
    Route::post('commandsender', 'Management\ManageCommandSenderController@store')->name('commandsender.query');

    Route::resource('usereditor', 'Management\ManageUserController');
    Route::post('usereditor/{id}/ban', 'Management\ManageUserController@ban')->name('usereditor.ban');

    Route::get('recyclebin', 'Management\ManageRecycleBinController@index')->name('recyclebin.index');
    Route::post('recyclebin/user/{id}/rollback', 'Management\ManageRecycleBinController@rollbackUser')->name('recyclebin.rollbackUser');
    Route::post('recyclebin/user/{id}/forcedelete', 'Management\ManageRecycleBinController@forcedeleteUser')->name('recyclebin.forcedeleteUser');

    Route::post('recyclebin/itemshop/{id}/rollback', 'Management\ManageRecycleBinController@rollbackItemshop')->name('recyclebin.rollbackItemshop');
    Route::post('recyclebin/itemshop/{id}/forcedelete', 'Management\ManageRecycleBinController@forcedeleteItemshop')->name('recyclebin.forcedeleteItemshop');

});

Route::get('/paypal', function () {
    return view('paypal');
});

Route::post('/testpost', function (Request $request) {
    return $request;
});

Route::get('/forum', 'Forum\ForumController@index');

Route::prefix('forum')->group(function () {

    Route::resource('topic', 'Forum\ForumTopicsController');
    Route::post('topic/addcomment', 'Forum\ForumTopicsController@addcomment')->name('topic.addcomment');

});
