<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('shop/index',"Api\ShopController@index");
Route::get('shop/list',"Api\ShopController@list");

//短信验证
Route::any('rember/sms',"Api\RemberController@sms");
//注册
Route::post('rember/reg',"Api\RemberController@reg");
//登录
Route::post('rember/login',"Api\RemberController@login");
//修改密码
Route::post('rember/change',"Api\RemberController@change");
//重置密码
Route::post('rember/reset',"Api\RemberController@reset");
//金额
Route::get('rember/detail',"Api\RemberController@detail");


//添加新地址
Route::post('address/address',"Api\AddressController@address");
//列表显示
Route::get('address/index',"Api\AddressController@index");
//编辑
Route::get('address/display',"Api\AddressController@display");
//编辑
Route::post('address/edit',"Api\AddressController@edit");


//添加购物车
Route::post('cart/add',"Api\CartController@add");
//显示购物车
Route::get('cart/index',"Api\CartController@index");

//添加订单接口
Route::post('order/add',"Api\OrderController@add");
//订单详情
Route::get('order/detail',"Api\OrderController@detail");
//订单列表
Route::get('order/index',"Api\OrderController@index");
//订单支付
Route::post('order/pay',"Api\OrderController@pay");