<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name')->comment("商家名称");
            $table->string('shop_img')->comment("logo");
            $table->float('shop_rating')->comment("评分");
            $table->boolean('brand')->comment("是否是品牌");
            $table->boolean('on_time')->comment("是否准时送达");
            $table->boolean('fengniao')->comment("是否蜂鸟配送");
            $table->boolean('bao')->comment("是否保标记");
            $table->boolean('piao')->comment("是否票标记");
            $table->boolean('zhun')->comment("是否准标记");
            $table->decimal('start_send')->comment("起送金额");
            $table->decimal('start_cost')->comment("配送费");
            $table->string("notice")->comment("店公告");
            $table->string("discount")->comment("优惠信息");
            $table->integer("status")->comment("状态 1：正常  0：待审核  -1：禁用");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
