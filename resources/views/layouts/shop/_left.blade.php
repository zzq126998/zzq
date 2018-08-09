<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        @auth
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>在线</a>
            </div>
        </div>
        @endauth

        @guest
            <div class="user-panel">
                <a href="{{route('user.login')}}" style="margin-left: 30px">登录</a>
            </div>
            @endguest
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>用户管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="http://shop.dxhang.cn/user/index"><i class="fa fa-circle-o"></i>用户列表</a></li>
                    <li><a href="http://shop.dxhang.cn/user/creat"><i class="fa fa-circle-o"></i>用户注册</a></li>
                </ul>
            </li>


            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="http://shop.dxhang.cn/admin/shop_category/index"><i class="fa fa-circle-o"></i>商家分类</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i>商家信息</a></li>
                    <li><a href="http://shop.dxhang.cn/shop/user/add"><i class="fa fa-circle-o"></i>账号注册</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>菜单及分类管理</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="http://shop.dxhang.cn/menucategories/index"><i class="fa fa-circle-o"></i> 菜单分类</a></li>
                    <li><a href="http://shop.dxhang.cn/menucategories/add"><i class="fa fa-circle-o"></i> 添加分类</a></li>
                    <li><a href="http://shop.dxhang.cn/menu/index"><i class="fa fa-circle-o"></i> 菜单列表</a></li>
                    <li><a href="http://shop.dxhang.cn/menu/add"><i class="fa fa-circle-o"></i>添加菜单</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>店铺分类</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="http://admin.dxhang.cn/admin/shop_category/index"><i class="fa fa-circle-o"></i> 分类列表</a></li>
                    <li><a href="http://admin.dxhang.cn/admin/shop_category/add"><i class="fa fa-circle-o"></i> 添加分类</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>订单管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="http://shop.dxhang.cn/order/index"><i class="fa fa-circle-o"></i> 订单列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>抽奖活动</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="http://shop.dxhang.cn/eventmember/index"><i class="fa fa-circle-o"></i>活动列表</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>