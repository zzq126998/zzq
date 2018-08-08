<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderShipped;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Exception\LogicException;

class ShopController extends Controller
{
    public function index(){
//        $categorys = ShopCategory::all();
        $shops = Shop::all();
        return view("admin.shop.index",compact("shops"));
    }
    public function add(Request $request){
          //获取shop_category 的值
          $categorys = ShopCategory::all();
          if($request->isMethod("post")){
              $data = $request->post();
              $re = User::create($data);
              if($re){
                  //获取shop_category_id的值
                  $data['shop_category_id'] = $re->id;
                  Shop::create($data);
                  $request->session()->flash('success',"添加成功");
                  return redirect()->route("shop.index");
              }
          }
        return view("admin.shop.add",compact("categorys"));
    }
    public function edit(Request $request,$id){
        $categorys = ShopCategory::all();
        $shops = Shop::findOrFail($id);
        if($request->isMethod("post")){
            $this->validate($request,[

            ]);
            $shops->update($request->post());
            $request->session()->flash('success',"编辑资料成功");
            return redirect()->route("shop.index");
        }
        return view("admin.shop.edit",compact('shops','categorys'));
    }
    public function del(Request $request,$id){
        $shop = Shop::findOrFail($id);
        $shop->delete();
        $request->session()->flash('success',"删除成功");
        return redirect()->route("shop.index");
    }
    public function exam(Request $request,$id){
        $shop = Shop::findOrFail($id);
//        dd($shop);
        if($shop->status === 1){
            $shop->status = 0;
            $shop->save();
            $order =\App\Models\Order::find(10);
            $user=User::where('shop_id',$id)->first();
            Mail::to($user)->send(new OrderShipped($order));
            $request->session()->flash('success',"审核成功");
            return redirect()->route("shop.index");
        }
        if($shop->status === 0){
            $shop->status = 1;
            $shop->save();
            $order =\App\Models\Order::find(10);

            $user=User::where('shop_id',$id)->first();

            Mail::to($user)->send(new OrderShipped($order));
            $request->session()->flash('success',"取消审核成功");
            return redirect()->route("shop.index");
        }

    }
}
