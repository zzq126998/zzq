@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="add" class="btn btn-success">添加</a>
    <div style="float: right">
        <a href="" class="btn btn-primary">已结束</a>
        <a href="" class="btn btn-primary">正在进行</a>
        <a href="" class="btn btn-primary">未开始</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>标题</td>
            <td>内容</td>
            <td>开始时间</td>
            <td>结束时间</td>
            <td>操作</td>
        </tr>
        @foreach($acts as $act)
            <tr>
                <td>{{$act->id}}</td>
                <td>{{$act->title}}</td>
                <td>{!! $act->content !!}</td>
                <td>{{$act->start_time}}</td>
                <td>{{$act->end_time}}</td>
                <td>
                    <a href="edit/{{$act->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="del/{{$act->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>



        @endforeach
    </table>
@endsection