@extends('layouts.admin.default')
@section('title','增加')
@section('content')
    <div style="background: #FFFFFF;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="用户名" name="name" value="{{old("name")}}"><br>
            <input type="possword" class="form-control"  placeholder="密码" name="password" value="{{old("password")}}"><br>
            <input type="email" class="form-control"  placeholder="email" name="email" value="{{old("email")}}"><br>
            <input type="submit" class="btn btn-success" style="margin-left: 260px">
        </form>
    </div>
@endsection