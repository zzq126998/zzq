@extends("layouts.admin.default")
@section("title","添加活动")
@section("content")
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label">活动</label>
            <div class="col-sm-10">
                <select name="event_id" class="form-control">
                    <option value="0">请选择活动</option>
                    @foreach($events as $event)
                        <option value="{{$event->id}}">{{$event->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">奖品名称</label>
            <div class="col-sm-10">
                <input type="text" value="{{old('title')}}" class="form-control" placeholder="请输入奖品名称" name="name">
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">奖品详情</label>
            <div class="col-sm-10">
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>
                <!-- 编辑器容器 -->
                <script id="container" name="description" type="text/plain"></script>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">提交</button>
            </div>
        </div>
    </form>
@endsection
