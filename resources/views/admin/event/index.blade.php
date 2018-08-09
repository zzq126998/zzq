@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="{{route('event.add')}}" class="btn btn-success">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>活动名称</td>
            <td>活动详情</td>
            <td>报名开始时间</td>
            <td>报名结束时间</td>
            <td>开奖时间</td>
            <td>报名人数限制</td>
            <td>是否已开奖</td>
            <td>操作</td>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{!!$event->content!!}</td>
                <td>{{$event->start_time}}</td>
                <td>{{$event->end_time}}</td>
                <td>{{$event->prize_time}}</td>
                <td>{{$event->num}}</td>
                <td>
                    @if($event->is_prize==1)
                        <i class="glyphicon glyphicon-ok" style="color: darkgreen"></i>
                    @else
                        <i class="glyphicon glyphicon-remove" style="color: red"></i>
                    @endif</td>
                <td>
                    <a href="edit/{{$event->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="del/{{$event->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                    <a href="lottery/{{$event->id}}" class="btn btn-danger">开奖</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection