<?php

namespace App\Http\Controllers\Api;

use App\Models\MenuCategories;
use App\Models\Menus;
use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends BaseController
{
    //首页商家显示
    public function list(Request $request){
//        $keyword="%";
        $keyword = $request->input('keyword')?$request->input('keyword'):"";
//        dd($keyword);
        $shops = Shop::where('status','1')->where('shop_name','like',"%{$keyword}%")->get();
            foreach ($shops as $shop){
                $shop->distance = rand(1000,3000);
                $shop->estimate_time = $shop->distance/1000;
            }
        return $shops;
    }
    public function index(Request $request){
        $id = $request->input('id');
        $shop = Shop::findOrFail($id);
        $shop->distance = rand(1000,3000);
        $shop->estimate_time = $shop->distance/1000;
        $shop->evaluate = [
            ["user_id"=> 12344,
                "username"=> "w******k",
                "user_img"=> "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time"=> "2017-2-22",
                "evaluate_code"=> 1,
                "send_time"=> 30,
                "evaluate_details"=> "不怎么好吃"],
            [
                "user_id"=> 12344,
                "username"=> "w******k",
                "user_img"=> "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time"=> "2017-2-22",
                "evaluate_code"=> 4.5,
                "send_time"=> 30,
                "evaluate_details"=> "很好吃"
            ]
        ];
        $cates = MenuCategories::where('shop_id',$id)->get();
        foreach($cates as $cate){
            $cate->goods_list = Menus::where('category_id',$cate->id)->get();
        }
        $shop->commodity = $cates;

        return $shop;
//        dd($shop);

    }
}
