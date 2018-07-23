@extends('layouts.shop.default')
@section('title','编辑')
@section('content')
    <div style="background: #ECF0F5;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="用户名" name="name" value="{{$users->name}}"><br>
            <input type="email" class="form-control"  placeholder="email" name="email" value="{{$users->email}}"><br>
            <input type="submit" class="btn btn-success" style="margin-left: 260px">
        </form>
    </div>
@endsection