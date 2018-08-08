@extends("layouts.admin.default")
@section("title","订单量统计")
@section("content")
    <form class="navbar-form navbar-right" method="get">
        <div class="form-group">
            <select name="show" class="form-control">
                <option value="">商家选择</option>
                @foreach($shops as $shop)
                    <option value="{{$shop->id}}" name="">{{$shop->shop_name}}</option>
                @endforeach
            </select>
        </div>
        {{--<div class="form-group">--}}
            {{--<input type="text" name="search" class="form-control" placeholder="请输入用户昵称" style="width: 300px">--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <table class="table table-hover table-bordered">
        <tr>
            <th>年-月-日</th>
            <th>商家昵称</th>
            <th>总金额</th>
            <th>总订单</th>
        </tr>
        @foreach($sums as $sum)
            <tr>
                <td>{{$sum->date}}</td>
                <td>{{$sum->shop->shop_name}}</td>
                <td>{{$sum->money}}</td>
                <td>{{$sum->count}}</td>
            </tr>
        @endforeach
    </table>
@endsection
