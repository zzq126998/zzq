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

    Route::get('activity/index',"ActivityController@index")->name("activity.index");
    Route::any('activity/add',"ActivityController@add")->name("activity.add");
    Route::any('activity/edit/{id}',"ActivityController@edit")->name("activity.edit");
    Route::get('activity/del/{id}',"ActivityController@del")->name("activity.del");

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

//菜品分类
    Route::get('menu/index',"MenuController@index")->name("menu.index");
    Route::any('menu/add',"MenuController@add")->name("menu.add");
    Route::any('menu/edit/{id}',"MenuController@edit")->name("menu.edit");
    Route::get('menu/del/{id}',"MenuController@del")->name("menu.del");


//菜品
    Route::get('menucategories/index',"MenuCategoriesController@index")->name("menucategories.index");
    Route::any('menucategories/add',"MenuCategoriesController@add")->name("menucategories.add");
    Route::any('menucategories/edit/{id}',"MenuCategoriesController@edit")->name("menucategories.edit");
    Route::get('menucategories/del/{id}',"MenuCategoriesController@del")->name("menucategories.del");

    //活动
    Route::get('activity/index',"ActivityController@index")->name("activity.index");
    Route::get('activity/look/{id}',"ActivityController@look")->name("activity.look");
});
