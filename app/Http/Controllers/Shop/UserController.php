<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
                }
            }
            return view("shop.user.add",compact('categorys'));
        }

}
