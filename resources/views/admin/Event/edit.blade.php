@extends("layouts.admin.default")
@section("title","添加活动")
@section("content")
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
                <input type="text" value="{{$event->title}}" class="form-control" placeholder="请输入活动名称"
                       name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">活动详情</label>
            <div class="col-sm-10">
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>
                <!-- 编辑器容器 -->
                <script id="container" name="content" type="text/plain">{!! $event->content !!}</script>
            </div>
        </div>
        <div class="form-group">
            <label for="start_time" class="col-sm-2 control-label">活动开始时间</label>
            <div class="col-sm-10">
                <input type="date" value="{{date('Y-m-d',$event->start_time)}}" class="form-control" placeholder="请输入活动开始时间"
                       name="start_time">
            </div>
        </div>
        <div class="form-group">
            <label for="end_time" class="col-sm-2 control-label">活动结束时间</label>
            <div class="col-sm-10">
                <input type="date" value="{{date('Y-m-d',$event->end_time)}}" class="form-control" placeholder="请输入活动结束时间"
                       name="end_time">
            </div>
        </div>
        <div class="form-group">
            <label for="end_time" class="col-sm-2 control-label">开奖时间</label>
            <div class="col-sm-10">
                <input type="date" value="{{date('Y-m-d',$event->prize_time)}}" class="form-control" placeholder="请输入活动开奖"
                       name="prize_time">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">报名人数</label>
            <div class="col-sm-10">
                <input type="text" value="{{$event->num}}" class="form-control" placeholder="请输入报名人数" name="num">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">提交</button>
            </div>
        </div>
    </form>
@endsection
