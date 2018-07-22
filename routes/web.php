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

Route::get('/', function () {
    return view('welcome');
});

//平台
Route::domain('admin.zzqlv.com')->namespace('Admin')->group(function () {
    //店铺分类
    Route::get('admin/shop_category/index',"ShopCategoryController@index")->name("admin.shop_category.index");
    Route::any('admin/shop_category/add',"ShopCategoryController@add")->name("admin.shop_category.add");
    Route::any('admin/shop_category/edit/{id}',"ShopCategoryController@edit")->name("admin.shop_category.edit");
    Route::get('admin/shop_category/del/{id}',"ShopCategoryController@del")->name("admin.shop_category.del");

});


Route::domain('admin.zzqlv.com')->namespace('Admin')->group(function () {
    //商家信息
    Route::get('admin/shop/index',"ShopController@index")->name("admin.shop.index");
    Route::any('admin/shop/add',"ShopController@add")->name("admin.shop.add");
    Route::any('admin/shop/edit/{id}',"ShopController@edit")->name("admin.shop.edit");
    Route::get('admin/shop/del/{id}',"ShopController@del")->name("admin.shop.del");

});


//商户
Route::domain('shop.zzqlv.com')->namespace('Shop')->group(function () {
    Route::get('user/reg',"UserController@reg")->name("reg");
    Route::any('shop/user/add',"UserController@add")->name("add");
});
