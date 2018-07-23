@extends('layouts.admin.default')
@section('title','编辑')
@section('content')
    <div style="background: #FFFFFF;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="用户名" name="name" value="{{$admins->name}}"><br>
            <input type="email" class="form-control"  placeholder="email" name="email" value="{{$admins->email}}"><br>
            <input type="submit" class="btn btn-success" style="margin-left: 260px">
        </form>
    </div>
@endsection