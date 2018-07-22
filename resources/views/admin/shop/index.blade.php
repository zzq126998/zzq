@extends('shop.layouts.default')
@section('title',"后台首页")
@section('content')
    <a href="add" class="btn btn-success">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>店铺分类id</td>
            <td>名称</td>
            <td>店铺图片</td>
            <td>评分</td>
            <td>是否是品牌</td>
            <td>是否准时送达</td>
            <td>是否蜂鸟配送</td>
            <td>是否保标记</td>
            <td>是否票标记</td>
            <td>是否准标记</td>
            <td>起送金额</td>
            <td>配送费</td>
            <td>店公告</td>
            <td>优惠信息</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($shops as $shop)
        <tr>
            <td>{{$shop->id}}</td>
            <td>{{$shop->shop_category_id}}</td>
            <td>{{$shop->shop_name}}</td>
            <td>{{$shop->shop_img}}</td>
            <td>{{$shop->shop_rating}}</td>
            <td>
                @if($shop->brand===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                @endif
                </td>
            <td>
                @if($shop->on_time===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                @endif
                </td>
            <td>
                @if($shop->fengniao===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                @endif
                </td>
            <td>
                @if($shop->bao===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                @endif
            </td>
            <td>
                @if($shop->piao===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                @endif
                </td>
            <td>
                @if($shop->zhun===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                @endif
            </td>
            <td>{{$shop->start_send}}</td>
            <td>{{$shop->start_cost}}</td>
            <td>{{$shop->notice}}</td>
            <td>{{$shop->discount}}</td>
            <td>{{$shop->status}}</td>
            <td>
                <a href="edit/{{$shop->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="del/{{$shop->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
            @endforeach
    </table>

@endsection