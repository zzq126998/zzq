@extends('layouts.shop.default')
@section('title','增加')
@section('content')
    <div class="">
        <form action="" method="post" class="form-horizontal">
            {{csrf_field()}}
            <table class="table table-bordered">
                <tr>
                    <td style="text-align: right; width: 20%">菜单分类名称</td>
                    <td><input type="text" name="name" class="col-sm-5 form-control" placeholder="菜单分类名称">
                </tr>

                <tr>
                    <td style="text-align: right; width: 20%">所属商家</td>
                    <td>
                        <select name="shop_id" class="col-sm-5 form-control" >
                            @foreach($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                            @endforeach
                        </select>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">菜品编号</td>
                    <td><input type="text" name="type_accumulation" class="col-sm-5 form-control" placeholder="菜品编号">
                </tr>

                <tr>
                    <td style="text-align: right; width: 20%">是否是默认分类</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="is_selected" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="is_selected" value="0" checked>否
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right; width: 20% ">描述</td>
                    <td><input type="text" name="description" class="col-sm-5 form-control" placeholder="描述"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="提交" class="btn btn-info">
                    </td>
                    <td>
                        <input type="reset" value="重置" class="btn btn-warning">
                    </td>
                </tr>


            </table>
        </form>
    </div>

@endsection