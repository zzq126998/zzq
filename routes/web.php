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
    Route::get('shop/index',"ShopController@index")->name("shop.index");
    Route::any('shop/add',"ShopController@add")->name("shop.add");
    Route::any('shop/edit/{id}',"ShopController@edit")->name("shop.edit");
    Route::get('shop/del/{id}',"ShopController@del")->name("shop.del");

    //平台管理员
    Route::get('admin/index',"AdminController@index")->name("admin.index");
    Route::any('admin/add',"AdminController@add")->name("admin.add");
    Route::any('admin/edit/{id}',"AdminController@edit")->name("admin.edit");
    Route::get('admin/del/{id}',"AdminController@del")->name("admin.del");
    Route::any('admin/login',"AdminController@login")->name("admin.login");
    Route::any('admin/logout',"AdminController@logout")->name("admin.logout");
    Route::any('admin/mopwd',"AdminController@mopwd")->name("admin.mopwd");
});


//商户
Route::domain('shop.zzqlv.com')->namespace('Shop')->group(function () {
    Route::get('user/reg',"UserController@reg")->name("reg");
    Route::any('shop/user/add',"UserController@add")->name("add");

    Route::get('user/index',"UserController@index")->name("user.index");
    Route::any('user/creat',"UserController@creat")->name("user.creat");
    Route::any('user/edit/{id}',"UserController@edit")->name("user.edit");
    Route::get('user/del/{id}',"UserController@del")->name("user.del");
    Route::any('user/login',"UserController@login")->name("user.login");
    Route::any('user/logout',"UserController@logout")->name("user.logout");
    Route::any('user/mopwd',"UserController@mopwd")->name("user.mopwd");
});
