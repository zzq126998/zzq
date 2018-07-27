<?php

namespace App\Http\Controllers\Shop;

use App\Models\MenuCategories;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuCategoriesController extends Controller
{
    public function index(){
        $menus = MenuCategories::paginate(4);
        return view('shop.menucategories.index',compact('menus'));
    }
    public function add(Request $request){
        $shops = Shop::all();
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
                'type_accumulation'=>'required',
                'description'=>'required'
            ]);
            MenuCategories::create($request->post());
            $request->session()->flash('success','添加菜品分类成功');
            return redirect()->route('menucategories.index');
        }
        return view('shop.menucategories.add',compact('shops'));
    }
    public function edit(Request $request,$id){
        $menus = MenuCategories::findOrFail($id);
//        dd($menus);
        $shops = Shop::all();
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
                'type_accumulation'=>'required',
                'description'=>'required'
            ]);
            $menus->update($request->post());
            $request->session()->flash('success','编辑菜品分类成功');
            return redirect()->route('menucategories.index');
        }
        return view('shop.menucategories.edit',compact('shops','menus'));
    }
    public function del(Request $request,$id){
        $menus = MenuCategories::findOrFail($id);
        if($menus->where('id','=','category_id')->count()){
            $request->session()->flash('danger','该分类下有菜品，不能删除');
            return redirect()->back()->withInput();
        }
        $request->session()->flash('success','删除成功');
        return redirect()->route('menucategories.edit');
    }
}
