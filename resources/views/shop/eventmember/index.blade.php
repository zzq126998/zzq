@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>活动名称</td>
            <td>报名开始时间</td>
            <td>报名结束时间</td>
            <td>操作</td>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->start_time}}</td>
                <td>{{$event->end_time}}</td>
                <td>
                    <a href="sign/{{$event->id}}" class="btn btn-info">报名</a>
                    <a href="del/{{$event->id}}" class="btn btn-danger">查看详情</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection