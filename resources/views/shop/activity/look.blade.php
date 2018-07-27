@extends('layouts.shop.default')
@section('title',"后台首页")
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>活动名称：</th>
            <td> {{$act->title}}</td>
        </tr>
        <tr>
            <th>活动详情：</th>
            <td>  {!! $act->content !!}</td>
        </tr>
        <tr>
            <th>开始时间：</th>
            <td>  {{$act->start_time}}</td>
        </tr>
        <tr>
            <th>结束时间：</th>
            <td>  {{$act->end_time}}</td>
        </tr>


    </table>
@endsection