<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><strong>asdasf</strong></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				{{--<li class="active"><a href="http://admin.zzqlv.com/admin/index">平台管理员列表<span class="sr-only">(current)</span></a></li>--}}
				{{--<li><a href="/activity/index">活动列表</a></li>--}}
				{{--<li><a href="http://admin.zzqlv.com/admin/index">平台管理</a></li>--}}
				{{--<li><a href="http://admin.zzqlv.com/order/index">订单量统计</a></li>--}}
				{{--<li><a href="http://admin.zzqlv.com/role/index">角色管理</a></li>--}}
				{{--@foreach(\App\Models\Navs::where('parent_id',0)->get() as $k1=>$v1)--}}
				{{--<li><a href="{{route($v1->url)}}">{{$v1->name}}</a></li>--}}
				{{--@endforeach--}}
				@foreach(\App\Models\Navs::where('parent_id',0)->get() as $k1=>$v1)
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$v1->name}} <span class="caret"></span></a>
					<ul class="dropdown-menu">

						@foreach(\App\Models\Navs::where("parent_id",$v1->id)->get() as $k2=>$v2)
							{{--@if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->can($v2->url))--}}
								<li><a href="{{route($v2->url)}}">{{$v2->name}}</a></li>
							{{--@endif--}}
						@endforeach

					</ul>
				</li>
				@endforeach
			</ul>
			<form class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">搜索</button>
			</form>
			<ul class="nav navbar-nav navbar-right">


				@auth('admin')

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="{{route('admin.mopwd')}}">修改密码</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{route('admin.logout')}}">注销</a></li>
						</ul>
					</li>
				@endauth

				@guest('admin')
						<li><a href="{{route('admin.login')}}">登录</a></li>
				@endguest
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>