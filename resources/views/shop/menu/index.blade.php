@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
    <div class="pull-right">
        <form class="form-inline" method="get" action="{{route('menu.index')}}">
            <div style="width: 500px; height: 35px;display: inline-block;position: relative;">
            <select name="menu_id" class="btn btn-default" style="position: absolute;left: 0px ;top: 0px;">
                <option value="0">分类</option>
                @foreach($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->name   }}</option>
                    @endforeach
            </select>
            <input type="text" class="btn btn-default" name="search" value="" placeholder="请输入关键字" style="position: absolute;left: 90px ;top: 0px; " >

               <input type="text" name="minmoney"  style="width: 64px; height: 34px;position: absolute;left: 270px ;top: 0px;border-radius: 5px;background-color: #F4F4F4;border:1px solid #DDDDDD" placeholder="最低价格">
               <b style="position: absolute;left: 335px ;top: 7px;"><i class="
glyphicon glyphicon-arrow-right"></i></b>
                <input type="text" name="maxmoney"  style=" width: 64px; height: 34px;position: absolute;left: 350px ;top: 0px;border-radius: 5px;background-color: #F4F4F4;border:1px solid #DDDDDD" placeholder="最高价格">

            <input type="submit" value="搜索" class="btn btn-default btn-success" style="position: absolute;right: 20px ;top: 0px;">
            </div>
        </form>
    </div>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>菜品名称</td>
            <td>商品图片</td>
            <td>评分</td>
            <td>所属商家id</td>
            <td>所属分类id</td>
            <td>价格</td>
            <td>描述</td>
            <td>月销量</td>
            <td>评分数量</td>
            <td>提示信息</td>
            <td>满意度数量</td>
            <td>满意度评分</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($menues as $menue)
        <tr>
            <td>{{$menue->id}}</td>
            <td>{{$menue->goods_name}}</td>
            <td>
                <img src="/{{$menue->goods_img}}" alt="">

            </td>
            <td>{{$menue->rating}}</td>
            <td>{{$menue->shop->shop_name}}</td>
            <td>{{$menue->cate->name}}</td>
            <td>{{$menue->goods_price}}</td>
            <td>{{$menue->description}}</td>
            <td>{{$menue->month_sales}}</td>
            <td>{{$menue->rating_count}}</td>
            <td>{{$menue->tips}}</td>
            <td>{{$menue->satisfy_count}}</td>
            <td>{{$menue->satisfy_rate}}</td>
            <td>{{$menue->status}}</td>
            <td>
                <a href="edit/{{$menue->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="del/{{$menue->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
            @endforeach
    </table>

@endsection