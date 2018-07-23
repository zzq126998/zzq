@extends('layouts.shop.default')
@section('title','修改密码')
@section('content')
    <div style="background: #ECF0F5;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="用户名" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}"><br>
            <input type="possword" class="form-control"  placeholder="旧密码" name="oldpassword" value=""><br>
            <input type="possword" class="form-control"  placeholder="新密码" name="password" value=""><br>
            <input type="possword" class="form-control"  placeholder="确认密码" name="password_confirmation" value=""><br>

            <input type="submit" class="btn btn-success" style="margin-left: 260px">
        </form>
    </div>
@endsection