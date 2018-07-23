@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="add" class="btn btn-success ">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($shops as $shop)
        <tr>
            <td>{{$shop->id}}</td>
            <td>{{$shop->name}}</td>
            <td>
                @if($shop->status===1)
                    <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                    @else
                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                    @endif
            </td>
            <td>
                <a href="edit/{{$shop->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="del/{{$shop->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
            @endforeach
    </table>

@endsection