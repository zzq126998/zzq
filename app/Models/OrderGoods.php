<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    public $fillable=['order_id','goods_id','amount','goods_name','goods_img','goods_price'];
}
