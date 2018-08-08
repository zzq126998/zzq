@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
    <div class="pull-right">
        <form class="form-inline" method="get" action="{{route('order.index')}}">
            {{--<div class="form-group">--}}
                {{--<h3>从：</h3>--}}
            {{--<input type="date" name="search" class="form-control" placeholder="请输入用户昵称" style="width: 300px">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<h3>  至：</h3>--}}
                {{--<input type="date" name="search" class="form-control" placeholder="请输入用户昵称" style="width: 300px">--}}
            {{--</div>--}}
            从：<input type="date" name="data1">  至：<input type="date" name="data2">
            <input type="submit" value="搜索">
        </form>
    </div>
<table class="table table-bordered">
    <tr>
        <th>id</th>
        <th>订单号</th>
        <th>收货人</th>
        <th>联系电话</th>
        <th>操作</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->sn}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->tel}}</td>
        <td>
            <a href="details/{{$order->id}}" class="btn btn-primary">订单详情</a>
            <a href="" class="btn btn-primary">
            @if($order->status===-1)已取消 @endif
            @if($order->status===0)代付款 @endif
            @if($order->status===1)待发货 @endif
            @if($order->status===2)待确认 @endif
            @if($order->status===3)完成 @endif
            </a>
            @if($order->status!=0 && $order->status!=-1)
            <a href="cancel/{{$order->id}}" class="btn btn-danger">取消订单</a>
            @endif
        </td>
    </tr>
        @endforeach
</table>
@endsection