@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="{{route('event.add')}}" class="btn btn-success">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>活动名称</td>
            <td>奖品名称</td>
            <td>奖品详情</td>
            <td>操作</td>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->event_id}}</td>
                <td>{{$event->name}}</td>
                <td>{!! $event->description !!}</td>
                <td>
                    <a href="edit/{{$event->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="del/{{$event->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection