<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Menus;
use App\Models\Order;
use App\Models\OrderGoods;
use App\Models\Rember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mrgoon\AliSms\AliSms;

class OrderController extends BaseController
{
    //添加订单
    public function add(Request $request){
        //得到用户地址信息
        $address = Address::find($request->input('address_id'));
        if($address === null){
            return [
                "status" => "false",
                "message" => "地址选择不正确"
            ];
        }
//        dd($address);
        $cart = Cart::where('user_id',$request->input('user_id'))->get();
//        dd($cart);
        //得到shop_id
        $ShopId = Menus::find($cart[0]->goods_id)->shop_id;
        $data['user_id']=$request->post('user_id');
        $data['shop_id']=$ShopId;
        $data['sn'] = date("ymdHis").rand(1000,9999);
        $data['province']=$address->provence;
        $data['city']=$address->city;
        $data['county']=$address->area;
        $data['detail_address']=$address->detail_address;
        $data['tel']=$address->tel;
        $data['name']=$address->name;
        //得到总价格
        $total = 0;
        foreach($cart as $k=>$v){
            $good = Menus::where('id',$v->goods_id)->first();
            $total+=$v->amount*$good->goods_price;
        }
        $data['total']=$total;
        //设置默认状态
        $data['status'] = 0;
        $order = Order::create($data);
        //添加订单商品
        foreach($cart as $k1=>$v1){
            //找到当前商品
            $good = Menus::find($v1->goods_id);

            $dataGoods['order_id']=$order->id;
            $dataGoods['goods_id']=$v1->goods_id;
            $dataGoods['amount']=$v1->amount;
            $dataGoods['goods_name']=$good->goods_name;
            $dataGoods['goods_img']="";
            $dataGoods['goods_price']=$good->goods_price;

            //添加到数据库中
            OrderGoods::create($dataGoods);
        }
        return[
            "status" => "true",
            "message" => "添加成功",
            "order_id" => $order->id
        ];
    }
    //订单详情
    public function detail(Request $request){
        $order= Order::find($request->input('id'));
        $data['id']=$order->id;
        $data['order_code']=$order->sn;
        $data['order_birth_time']=(string)$order->created_at;
        $data['order_status']=$order->order_status;
        $data['shop_id']=$order->shop_id;
        $data['shop_name']=$order->shop->shop_name;
        $data['shop_img']="";
        $data['order_price']=$order->total;
        $data['order_address']=$order->province.$order->city.$order->county.$order->detail_address;
        $data['goods_list']=$order->goods;
        return $data;
    }
    //订单列表
    public function index(Request $request){
        $orders = Order::where('user_id',$request->input('user_id'))->get();
        foreach ($orders as $order){
            $data['id']=$order->id;
            $data['order_code']=$order->sn;
            $data['order_status']=$order->order_status;
            $data['order_birth_time']= (string)$order->created_at;
            $data['shop_id']= (string)$order->shop_id;
            $data['shop_name']=$order->shop->shop_name;
            $data['shop_img']="";
            $data['order_price']=$order->total;
            $data['order_address']=$order->province.$order->city.$order->county.$order->detail_address;
            $data['goods_list']=$order->goods;
            $datas[] = $data;
        }
        return $datas;
    }
    //订单支付
    public function pay(Request $request){
        $order = Order::find($request->input('id'));
        $rember = Rember::find($order->user_id);
        if($order->total>$rember->money){
            return[
                'status'=>'false',
                'message'=>'穷逼',
            ];
        }
        $rember->money = $rember->money - $order->total;
        $rember->save();

        $order->status = 1;
        $order->save();
        //支付完成后的短信通知
        $tel = $order->tel;
        // dd($tel);
        $config = [
            'access_key' => 'LTAIKffmJpYco0bb',
            'access_secret' => 'qbKyJg0orThMTnbZsUezqz1Gk8BlDE',
            'sign_name' => '周智强',
        ];
        $product = $order->sn;
        $aliSms = new AliSms();
        $response = $aliSms->sendSms($tel, 'SMS_141585119', ['product'=> $product], $config);
        dd($response);
        return[
            'status'=>'ture',
            'message'=>'支付成功',
        ];
    }
}
