@extends('layouts.admin.default')
@section('title','增加')
@section('content')
    <div style="background: #FFFFFF;height: 300px;width: 600px;margin:0 auto;margin-top: 50px;">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control"  placeholder="用户名" name="name" value="{{old("name")}}"><br>
            <input type="possword" class="form-control"  placeholder="密码" name="password" value="{{old("password")}}"><br>
            <input type="email" class="form-control"  placeholder="email" name="email" value="{{old("email")}}"><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">角色名称</label>
                <div class="col-sm-10">
                    @foreach($roles as $role)
                        <input type="checkbox" name="role[]" value="{{$role->name}}">{{$role->name}}
                    @endforeach
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-success" style="margin-left: 260px">
        </form>
    </div>
@endsection