<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use App\Models\OrderGoods;
use App\Models\Rember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends BaseController
{
    //显示订单
    public function index(Request $request){
       $orders =  Order::paginate(4);
        return view("shop.order.index",compact("orders"));
    }
    //订单详情
    public function details(Request $request,$id){
        $order = Order::find($id);
        $member = Rember::find($order->user_id);
//        dd($member);
//        $goods = OrderGoods::
        $goods = OrderGoods::where('order_id',$order->id)->get();
        return view("shop.order.details",compact("order","member","goods"));
    }
    //取消订单
    public function cancel(Request $request,$id){
        $orders = Order::find($id);
        $rember = Rember::find($orders->user_id);
//        dd($orders->name);
        if($orders->status===1){
            //退款
            $rember->money = $rember->money + $orders->total;
            //修改状态
            $orders->status = -1;
            $orders->save();
            $rember->save();
            $request->session()->flash("success","取消订单成功");
            return redirect()->route("shop.order.index");
        }
    }
}
