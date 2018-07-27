<?php

namespace App\Http\Controllers\Shop;

use App\Models\MenuCategories;
use App\Models\Menus;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(){
        $search = \request()->input('search');
        $minmoney = \request()->input('minmoney');
        $maxmoney = \request()->input('maxmoney');
        $menu_id = \request()->input('menu_id');
//        dd($search);
        $query = Menus::orderBy('id');
        if($minmoney!==null){
            $query->where('goods_price','>=',$minmoney);
        }
        if($maxmoney!==null){
            $query->where('goods_price','<=',$maxmoney);
        }
        if($menu_id!==null){
            $query->where('category_id','=',$menu_id);
        }
        if($search!==null){
            $query->where('goods_name','like',"%{$search}%");
        }
//        dd($query);
//        $shopId = Auth::user()->shop_id;
//        $shops = Shop::where('id','=',$shopId)->first();
        $menus = MenuCategories::all();
        $menues = $query->paginate(4);
//        dd($menues);
        return view('shop.menu.index',compact('shops','menus','menues'));
    }
    public function add(Request $request){
        $shops = Shop::all();
        $menus = MenuCategories::all();

//        dd($shopId);
        if($request->isMethod('post')){
            $this->validate($request,[
                'goods_name'=>'required',
                'category_id'=>'required',
                'goods_price'=>'required',
                'description'=>'required'
            ]);
            $data = $request->post();
            $shopId = Auth::user()->shop_id;
//            dd($shopId)
            $data['shop_id'] = $shopId;
            $data['goods_img'] = "";
            if($request->file('goods_img')){
                $data['goods_img'] = $request->file('goods_img')->store('uploads/menu');
            }
            Menus::create($data);
            $request->session()->flash('success','添加成功');
            return redirect()->route('menu.index');
        }
        return view('shop.menu.add',compact('shops','menus'));
    }
    public function edit(Request $request,$id){
        $menues = Menus::findOrFail($id);
        $shops = Shop::all();
        $menus = MenuCategories::all();
        if($request->isMethod('post')){
            $this->validate($request,[
                'goods_name'=>'required',
                'category_id'=>'required',
                'goods_price'=>'required',
                'description'=>'required'
            ]);
            $menues->update($request->post());
            $request->session()->flash('success','修改成功');
            return redirect()->route('menu.index');
        }
        return view('shop.menu.edit',compact('shops','menus','menues'));
    }
    public function del(Request $request,$id){
        $menues = Menus::findOrFail($id);
        $menues->delete();
        $request->session()->flash('success','删除成功');
        return redirect()->route('menu.index');
    }
}
