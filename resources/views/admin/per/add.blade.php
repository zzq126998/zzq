@extends('layouts.admin.default')
@section('title','增加')
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                @foreach($urls as $url)
                    <input type="checkbox" name="role[]" value="{{$url}}">{{$url}}<br>
                @endforeach
            </div>
        </div>

        <input type="submit" class="btn btn-success" style="margin-left: 260px">
    </form>
@endsection