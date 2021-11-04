<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'FrontController@index');
Route::get('about-us', 'FrontController@about_us');
Route::get('offering', 'FrontController@offering');
Route::get('marketplace', 'FrontController@marketplace');
Route::get('faq', 'FrontController@faq');
Route::get('career', 'FrontController@career');
Route::get('contact', 'FrontController@contact');
Route::get('/register', 'FrontController@register');
Route::get('/register-step-2', 'FrontController@registerStep2')->name('register-step-2');
Route::get('/register-step-3', 'FrontController@registerStep3')->name('register-step-3');

Route::Post('/register/f', 'UsersController@store')->name('user.register');
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    exec('composer dump-autwoload');
});

Route::get('accept/allocation/{is_post}/{allocation_id}', 'AjaxController@acceptAllocation');
Route::get('logout', 'Auth\LoginController@logout');


//middleware check

Route::group(['middleware' => 'registration'], function () {

    //for vue routes
    Route::get('home', 'DashboardController@index')->name('home');
    Route::get('account/settings', 'DashboardController@index');
    Route::get('supplier/create/post', 'DashboardController@index');

    // for all ajax requests
    Route::get('/ajax/get/all-preferences', 'PreferenceController@supplierPreferences');
    Route::get('/ajax/user/pools', 'PoolsController@supplierPools');

    //user profile updates
    Route::post('/ajax/user/update/profile', 'AjaxUserController@updateProfile');
    Route::post('/ajax/user/update/password', 'AjaxUserController@updatePassword');
    Route::post('/ajax/user/update/notification', 'AjaxUserController@updateNotification');

    // routes for supplier
    Route::post('/ajax/update/supplier-preferences', 'PreferenceController@updateSupplierPreferences');
    Route::get('/ajax/supplier/posts', 'AjaxSupplierController@getPosts');
    Route::get('/ajax/supplier/posts', 'AjaxSupplierController@getPosts');


    Route::post('/ajax/supplier/pool/add', 'AjaxSupplierController@addNewPool');
    Route::post('/ajax/supplier/pool/update', 'AjaxSupplierController@updatePool');
    Route::post('/ajax/supplier/pool/delete', 'AjaxSupplierController@deletePool');

    //supplier post route
    Route::post('/ajax/supplier/post/create', 'AjaxSupplierController@createNewPost');

});

Route::get('search', 'HomeController@index');
Route::get('dashboard', 'HomeController@dashboard');

Route::post('supplier/post', 'SuppliersController@store');
Route::post('supplier/postcsv', 'SuppliersController@addcsv');

Route::get('allocation/{id}/{type?}', 'SuppliersController@supplierAllocation');
Route::post('allocation/{id}/{type?}', 'SuppliersController@storeAllocation');
Route::get('supplier/reissue_post/{supplier_post_id}/{buyer_post_id}', 'SuppliersController@reissue_post');

Route::get('allocationShow/{id}', 'SuppliersController@showAllocation');
Route::get('reallocation/{id}/{quantity}', 'SuppliersController@sendReallocation');

Route::post('buyer/post', 'BuyersController@buyerStore');
Route::post('buyer/buyer_post_Ajax', 'BuyersController@buyerStoreAjax');

Route::get('buyer/profile/{pid}', 'BuyersController@buyerProfile');
Route::get('delete/buyer/post/{id}', 'BuyersController@deleteBuyerPost');
Route::get('check/buyerpost/{id}', 'BuyersController@checkPost');
Route::post('search', 'SearchController@search');
Route::resource('users', 'UsersController');
Route::post('update/logistics', 'UsersController@updateLogistics');
Route::post('update/preference', 'UsersController@updatePreference');
Route::post('finish/registration', 'UsersController@finishRegistration');
Route::post('update/distributionEstrictions', 'UsersController@updateDistributionEstrictions');

Route::resource('categories', 'CategoriesController');
Route::resource('warehouse', 'WarehouseController');
Route::resource('pools', 'PoolsController');
Route::resource('products', 'ProductsController');
Route::post('product/action', 'ProductsController@productAction');
Route::post('category/action', 'CategoriesController@categoryAction');
Route::post('pool/action', 'PoolsController@poolAction');
Route::post('warehouse1/action', 'WarehouseController@wareHouseAction');
Route::get('warehouse1/search/{key?}', 'WarehouseController@wareHouseSearch');
Route::get('pool/search/{key?}', 'PoolsController@poolSearch');
Route::get('product/search/{key?}', 'ProductsController@productSearch');
Route::get('category/search/{key?}', 'CategoriesController@categorySearch');
Route::get('getproduct/{id?}', 'AjaxController@getProduct');
Route::get('getproducttag', 'ProductsController@getProductTag');
Route::get('getsku', 'AjaxController@getSku');


Route::get('allallocation', 'SuppliersController@allAllocation');
Route::get('allnotification', 'SuppliersController@allNotification');
Route::get('showAllocation/{id}/{note_id}', 'SuppliersController@showAllocation');
Route::get('show/supplier/post/detail/{id}', 'SuppliersController@showDetail');

Route::get('showBankInfo/{buyer_id}', 'SuppliersController@showBuyerPaymentInfo');
Route::get('showSupplierBankInfo/{buyer_id}', 'SuppliersController@showSupplierPaymentInfo');
Route::post('addrating/{allocation_id}', 'SuppliersController@addRating');

Route::get('admin/setting/{type}', 'SettingsController@create');
Route::post('admin/setting/{type}/store', 'SettingsController@store');
Route::post('admin/setting/{type}/delete', 'SettingsController@delete');

Route::get('admin/buyers', 'BuyersController@allBuyers');
Route::get('admin/buyer/{id}', 'BuyersController@singleBuyerPost');
Route::get('admin/suppliers', 'SuppliersController@allSuppliers');
Route::get('admin/supplier/post/{id}', 'SuppliersController@showSuppliersPost');
Route::get('admin/supplier/single/post/{id}', 'SuppliersController@showSingleSuppliersPost');

Route::get('admin/allocation/{id}/{type?}', 'SuppliersController@allocation');
Route::post('admin/allocation/{id}/{type?}', 'SuppliersController@storeAllocation');
Route::post('admin/add/pool/{id}', 'UsersController@addPool');

Route::resource('producttags', 'TagsController');
Route::post('producttag/action', 'TagsController@productTagAction');
Route::get('producttag/search/{keyword}', 'TagsController@productTagSearch');

Route::get('buyer/allocation/{type}/{id}', 'AjaxController@checkAllocationStatus');
Route::get('buyer/update/allocation/{type}/{id}', 'SuppliersController@updateAllocationStatus');
Route::get('allocation/buyer/{sid}/{bid}', 'SuppliersController@allocationToBuyer');
Route::get('reject_allocation/buyer/{sid}/{bid}', 'SuppliersController@RejectallocationToBuyer');
Route::get('checkallocation/buyer', 'AjaxController@checkSupplierPostTimeStatus');
Route::get('addbank/detail/{supplier_post_id}/{allocation_id}', 'AjaxController@addBankDetail');
Route::post('addbank/detail/{supplier_post_id}/{allocation_id}', 'SuppliersController@storeBankDetail');
Route::get('buyer/check/allocation', 'AjaxController@checkAllocation');
Route::get('buyerlogin/{id}', 'AjaxController@buyerLogin');
Route::get('profile', 'UsersController@profile');
Route::post('profile/update', 'UsersController@profileUpdate');
Route::get('get/warehouse/pool/{pid}/{id}', 'AjaxController@getWarehousePool');
Route::get('delete/warehouse/pool', 'AjaxController@deleteWarehousePool');
Route::resource('sku', 'SkuController');
Route::resource('preference', 'PreferenceController');
Route::post('preference/action', 'PreferenceController@preferenceAction');
Route::get('preference/search/{key?}', 'PreferenceController@preferenceSearch');
Route::post('sku/action', 'SkuController@skuAction');
Route::get('sku/search/{key?}', 'SkuController@skuSearch');
Route::get('check/post/time', 'AjaxController@checkPostTime');
Route::get('update/post/staus/{type}/{id}', 'SuppliersController@updatePostStatus');
Route::get('users/delete/{id}', 'UsersController@deleteUser');


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sender', function () {
    return view('sender');
});

Route::get('/receive', function () {
    return view('receive');
});
