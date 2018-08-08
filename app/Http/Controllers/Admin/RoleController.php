<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends BaseController
{
    //首页显示
        public function index(){
            $roles = Role::all();
            return view('admin.role.index',compact('roles'));
        }
        //添加权限
        public function add(Request $request){
            if($request->isMethod('post')){
                $data['name'] = $request->post('name');
                $data['guard_name'] = "admin";
//                dd($data);
                $role = Role::create($data);
                //给角色添加权限
                $role->syncPermissions($request->post('per'));
                return redirect()->route('role.index')->with('success','创建'.$role->name."成功");
            }
            //获取到所有的权限
            $pers = Permission::all();
                return view("admin.role.add",compact('pers'));
        }
        //修改权限
    public function edit(Request $request,$id){
            $role = Role::find($id);
            if($request->isMethod('post')){
//                $this->validate($request,[
//                    'name'=>'required',
//                    'guard_name'=>'required',
//                ]);
            $data['name'] = $request->post('name');
            $role->update($data);
            $role->syncPermissions($request->post('per'));
            return redirect()->route('role.index')->with('success', '创建' . $role->name . "成功");
            }
            $pers = Permission::all();
            return view('admin.role.edit',compact('role','pers'));
    }
    //删除
    public function del(Request $request,$id){
            Role::findOrFail($id)->delete();
    }
}
