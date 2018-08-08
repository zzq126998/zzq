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
    return view('index');
});

Route::get('/mail', function () {
    $order =\App\Models\Order::find(10);
    return new \App\Mail\OrderShipped($order);
});

//平台
Route::domain('admin.dxhang.cn')->namespace('Admin')->group(function () {
    //店铺分类
    Route::get('admin/shop_category/index',"ShopCategoryController@index")->name("admin.shop_category.index");
    Route::any('admin/shop_category/add',"ShopCategoryController@add")->name("admin.shop_category.add");
    Route::any('admin/shop_category/edit/{id}',"ShopCategoryController@edit")->name("admin.shop_category.edit");
    Route::get('admin/shop_category/del/{id}',"ShopCategoryController@del")->name("admin.shop_category.del");

    Route::get('activity/index',"ActivityController@index")->name("activitys.index");
    Route::any('activity/add',"ActivityController@add")->name("activitys.add");
    Route::any('activity/edit/{id}',"ActivityController@edit")->name("activitys.edit");
    Route::get('activity/del/{id}',"ActivityController@del")->name("activitys.del");

});


Route::domain('admin.dxhang.cn')->namespace('Admin')->group(function () {
    //商家信息
    Route::get('shop/index',"ShopController@index")->name("shop.index");
    Route::any('shop/add',"ShopController@add")->name("shop.add");
    Route::any('shop/edit/{id}',"ShopController@edit")->name("shop.edit");
    Route::get('shop/del/{id}',"ShopController@del")->name("shop.del");
    Route::get('shop/exam/{id}',"ShopController@exam")->name("shop.exam");

    //订单量统计
    Route::any('order/index',"OrderController@index")->name("orders.index");
    //平台管理员
    Route::get('admin/index',"AdminController@index")->name("admin.index");
    Route::any('admin/add',"AdminController@add")->name("admin.add");
    Route::any('admin/edit/{id}',"AdminController@edit")->name("admin.edit");
    Route::get('admin/del/{id}',"AdminController@del")->name("admin.del");
    Route::any('admin/login',"AdminController@login")->name("admin.login");
    Route::any('admin/logout',"AdminController@logout")->name("admin.logout");
    Route::any('admin/mopwd',"AdminController@mopwd")->name("admin.mopwd");


    //平台导航管理
    Route::get('nav/index',"NavController@index")->name("nav.index");
    Route::any('nav/add',"NavController@add")->name("nav.add");
    Route::any('nav/edit/{id}',"NavController@edit")->name("nav.edit");
    Route::get('nav/del/{id}',"NavController@del")->name("nav.del");

    //权限管理
    Route::get('per/index',"PerController@index")->name("per.index");
    Route::any('per/add',"PerController@add")->name("per.add");
    Route::any('per/edit/{id}',"PerController@edit")->name("per.edit");
    Route::get('per/del/{id}',"PerController@del")->name("per.del");

    //角色管理
    Route::get('role/index',"RoleController@index")->name("role.index");
    Route::any('role/add',"RoleController@add")->name("role.add");
    Route::any('role/edit/{id}',"RoleController@edit")->name("role.edit");
    Route::any('role/del/{id}',"RoleController@del")->name("role.del");


    //抽奖活动管理
    Route::get('event/index',"EventController@index")->name("event.index");
    Route::any('event/add',"EventController@add")->name("event.add");
    Route::any('event/edit/{id}',"EventController@edit")->name("event.edit");
    Route::any('event/del/{id}',"EventController@del")->name("event.del");

    //奖品列表
    Route::get('event_prize/index',"EventPrizeController@index")->name("event_prize.index");
    Route::any('event_prize/add',"EventPrizeController@add")->name("event_prize.add");
    Route::any('event_prize/edit/{id}',"EventPrizeController@edit")->name("event_prize.edit");
    Route::any('event_prize/del/{id}',"EventPrizeController@del")->name("event_prize.del");

    //没有权限显示
//    Route::any('curr',"RoleController@del")->name("role.del");
});


//商户
Route::domain('shop.dxhang.cn')->namespace('Shop')->group(function () {
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

//订单管理
    Route::get('order/index',"OrderController@index")->name("order.index");
    Route::any('order/cancel/{id}',"OrderController@cancel")->name("order.cancel");
    Route::get('order/details/{id}',"OrderController@details")->name("order.details");

//菜品
    Route::get('menucategories/index',"MenuCategoriesController@index")->name("menucategories.index");
    Route::any('menucategories/add',"MenuCategoriesController@add")->name("menucategories.add");
    Route::any('menucategories/edit/{id}',"MenuCategoriesController@edit")->name("menucategories.edit");
    Route::get('menucategories/del/{id}',"MenuCategoriesController@del")->name("menucategories.del");

    //抽奖活动报名
    //抽奖活动管理
    Route::get('eventmember/index',"EventMemberController@index")->name("eventmember.index");
    Route::any('eventmember/sign/{id}',"EventMemberController@sign")->name("eventmember.sign");
    Route::any('eventmember/edit/{id}',"EventMemberController@edit")->name("eventmember.edit");


    //活动
    Route::get('activity/index',"ActivityController@index")->name("activity.index");
    Route::get('activity/look/{id}',"ActivityController@look")->name("activity.look ");
});
