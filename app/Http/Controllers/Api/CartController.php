<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends BaseController
{
    //添加购物车
    public function add(Request $request){
        $cart = $request->input();
//        dd($cart);
        //添加购物车时删除该用户原有的购物车
        Cart::where('user_id',$cart['user_id'])->delete();
        $goods = $request->input('goodsList');
        $count = $request->input('goodsCount');
        foreach ($goods as $k=>$good){
            $data = [
                'user_id' => $cart['user_id'],
                'goods_id'=>$good,
                'amount'=>$count[$k]
            ];
            Cart::create($data);
        }
        return[
            'status'=>'true',
            'message'=>'商品添加成功'
        ];
    }
    //显示购物单
    public function index(Request $request){
        $user_id = $request->input('user_id');
//        $goods_id = $request->input('goods_id');
        $lists = Cart::where('user_id',$user_id)->get();
        $data['totalCost']= 0;
        foreach($lists as $list){
            $menus = Menus::where('id',$list['goods_id'])->first();
//            dd($menus);
            $list['goods_name'] = $menus['goods_name'];
            $list['img'] = "";
            $list['goods_price'] = $menus['goods_price'];

            $data['totalCost']+=$list['goods_price']*$list['amount'];
        }
        $data['goods_list'] = $lists;
        return $data;
    }
}
