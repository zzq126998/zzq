<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    public $fillable = ['goods_name','rating','shop_id','category_id','goods_price','description','month_sales','rating_count','tips','satisfy_count','satisfy_rate','goods_img','status'];

    public function shop(){
//        dd(111);
        return $this->belongsTo(Shop::class,"shop_id");
    }
    public function cate(){
        return $this->belongsTo(MenuCategories::class,"category_id");
    }
}
