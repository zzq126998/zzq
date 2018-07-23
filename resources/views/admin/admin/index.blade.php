@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="add" class="btn btn-success ">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>用户名</td>
            <td>email</td>
            <td>操作</td>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>
                <a href="edit/{{$admin->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="del/{{$admin->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
            @endforeach
    </table>

@endsection