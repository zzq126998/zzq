@extends('layouts.shop.default')
@section('title','登录')
@section('content')
    <div style="background: #ECF0F5;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="用户名" name="name" value="{{old("name")}}"><br>
            <input type="password" class="form-control"  placeholder="密码" name="password" value="{{old("password")}}"><br>
            <input type="checkbox" name="remember"> 是否记住账号<br>
            <input type="submit" class="btn btn-success" style="margin-left: 260px">
            <a href="{{route('user.creat')}}" class="btn btn-success">注册</a>
        </form>
    </div>
@endsection