@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
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
                    <a href="look/{{$act->id}}" class="btn btn-info"><i class="glyphicon glyphicon-file"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection