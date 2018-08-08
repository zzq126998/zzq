@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="{{route('role.add')}}" class="btn btn-success">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>角色名</td>
            <td>拥有权限</td>
            <td>操作</td>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{ str_replace(['[',']','"'],'', $role->permissions()->pluck('name')) }}</td>
                <td>
                    <a href="edit/{{$role->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="del/{{$role->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection