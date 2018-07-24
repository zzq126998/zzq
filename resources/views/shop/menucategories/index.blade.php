@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
    {{--<a href="add" class="btn btn-success">添加</a>--}}
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>分类名称</td>
            <td>菜品编号</td>
            <td>所属商家</td>
            <td>描述</td>
            <td>是否是默认分类</td>
        </tr>
        @foreach($menus as $menu)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->type_accumulation}}</td>
                <td>{{$menu->shop->shop_name}}</td>
                <td>{{$menu->description}}</td>
                <td>
                    @if($menu->is_selected==1)
                        <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                    @else
                        <i class="glyphicon glyphicon-remove" style="color: red"></i>
                    @endif
                    </td>
                <td>
                    <a href="edit/{{$menu->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="del/{{$menu->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection