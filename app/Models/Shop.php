<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Shop extends Model
{

    use Searchable;

    /**
     * 索引的字段
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('id','shop_name');
    }
    public $fillable = ['shop_name','shop_rating','brand','on_time','fengniao','bao','piao','zhun','start_send','start_cost','notice','discount','shop_category_id'];
    public function shop(){
        return $this->belongsTo(ShopCategory::class,"shop_category_id");
    }
}
