@extends('layouts.admin.default')
@section('title',"后台首页")
@section('content')
    <a href="{{route('per.add')}}" class="btn btn-success">添加</a>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>所属平台</td>
            <td>操作</td>

        </tr>
        @foreach($pers as $per)
            <tr>
                <td>{{$per->id}}</td>
                <td>{{$per->name}}</td>
                <td>{{$per->guard_name}}</td>
                <td>
                    <a href="edit/{{$per->id}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="del/{{$per->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection