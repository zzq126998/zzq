@extends('layouts.admin.default')
@section('title','增加')
@section('content')
    <div style="background: #ECF0F5;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="分类名称" name="name" value="{{$shops->name}}"><br>
            <input type="text" class="form-control"  placeholder="logo" name="logo" value="{{$shops->logo}}"><br>
            {{--<input type="file" name="img" style="margin-left: 260px"><br>--}}
            <input type="radio" name="status" value="" @if($shops->status===1) checked @endif>显示
            <input type="radio" name="status" value="" @if($shops->status===0) checked @endif>隐藏

            <input type="submit" class="btn btn-success" style="margin-left: 260px">
        </form>
    </div>


@endsection