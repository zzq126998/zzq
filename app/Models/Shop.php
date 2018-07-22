<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $fillable = ['shop_name','shop_rating','brand','on_time','fengniao','bao','piao','zhun','start_send','start_cost','notice','discount','shop_category_id'];
    public function shop(){
        return $this->belongsTo(ShopCategory::class,"shop_category_id");
    }
}
