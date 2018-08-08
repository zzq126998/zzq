<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends BaseController
{
    public function index(){

        $shops = ShopCategory::paginate(4);

        return view("admin.shop_category.index",compact('shops'));
    }
    public function add(Request $request){
        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required|min:2"
            ]);
            ShopCategory::create($request->all());
            $request->session()->flash('success',"添加成功");
            return redirect()->route("shop_category.index");
        }
        return view("admin.shop_category.add");
    }
    public function edit(Request $request,$id){
        $shops = ShopCategory::findOrFail($id);
        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required|min:2"
            ]);
//            dd($request->post());
            $shops->update($request->post());
            $request->session()->flash('success',"编辑信息成功");
            return redirect()->route("admin.shop_category.index");
        }
        return view("admin.shop_category.edit",compact("shops"));
    }
    public function del(Request $request,$id){
        $data = ShopCategory::find($id);
        $data->delete();
        $request->session()->flash("success","删除成功");
        return redirect()->route("shop_category.index");
    }
}
