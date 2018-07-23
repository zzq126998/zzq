@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>用户名</td>
            <td>email</td>
            <td>操作</td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="edit/{{$user->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="del/{{$user->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
            @endforeach
    </table>

@endsection