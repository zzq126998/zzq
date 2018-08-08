<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PerController extends BaseController
{
    public function index(){
        $pers = Permission::all();
        return view('admin.per.index',compact('pers'));
    }

    //添加权限
    public function add(Request $request){
        //添加权限
//        $per = Permission::create(['name'=>'admin.shop_category.index','guard_name'=>'admin']);
        //得到所有权限
        $routes = Route::getRoutes();
//        dd($routes);
        //声明一个空数组来存数据
        $urls = [];
        foreach ($routes as $route){
            if($route->action['namespace']==="App\Http\Controllers\Admin"){
                if (isset($route->action['as'])){
                    $urls[]=$route->action['as'];
                }
            }
        }
        if($request->isMethod('post')){

        }
//        dd($urls);
        return view('admin.per.add',compact('urls'));
    }
    public function edit(Request $request,$id){
        $per = Permission::find($id);
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
                'guard_name'=>'required'
            ]);
            $per->update($request->post());
            return redirect()->route('role.index')->with('success','修改成功');
        }
        return view('admin.per.edit',compact('per'));
    }
    public function del(Request $request,$id){
        Permission::findOrFail($id)->delete();
        return redirect()->route('role.index')->with('success','删除成功');
    }
}
