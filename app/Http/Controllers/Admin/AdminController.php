<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends BaseController
{
    //显示
    public function index(){
        $admins = Admin::all();
        return view("admin.admin.index",compact('admins'));
    }
    //添加
    public function add(Request $request){
        if($request->isMethod("post")){
            $data = $request->post();
            $this->validate($request,[
                'name'=>'required|min:2',
                'password'=>'required'
            ]);
            $data['password'] = bcrypt($data['password']);
            $admin = Admin::create($data);
            //给用户对象添加角色 同步角色
            $admin->syncRoles($request->post('role'));

            $request->session()->flash('success',"添加用户成功");
            return redirect()->route("admin.index");
        }
        //得到用户权限
        $roles = Role::all();
        return view('admin.admin.add',compact('roles'));
    }
    //编辑
    public function edit(Request $request,$id){
        $admins = Admin::findOrFail($id);
        if($request->isMethod("post")){
            $admins->update($request->post());
            $request->session()->flash('success','修改成功');
            return redirect()->route('admin.index');
        }
        return view("admin.admin.edit",compact('admins'));
    }
    //删除
    public function del(Request $request,$id){
        $admin = Admin::find($id);
        $admin->delete();
        $request->session()->flash('success','删除成功');
        return redirect()->route('admin.index');
    }
    //登录
    public function login(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required|min:2',
                'password'=>'required|min:2'
            ]);
            if(Auth::guard('admin')->attempt(['name'=>$request->post('name'),'password'=>$request->post('password')],$request->has('remember'))){
                $request->session()->flash('success','登陆成功');
                return redirect()->intended(route('admin.index'));
            }else{
                $request->session()->flash('danger','用户名或密码错误');
                return redirect()->back()->withInput();
            }
        }
        return view('admin.admin.login');
    }
    //退出登录
    public function logout(){
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect()->route('admin.login');
    }
    //修改密码
    public function mopwd(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'oldpassword'=>'required',
                'password'=>'required|confirmed'
            ]);
            $id = Auth::user()->id;
//            $oldpassword = Auth::user()->password;
            $oldpassword = $request->input('oldpassword');
            $password = $request->input('password');
//                       dd($id,$oldpassword);
            $res = DB::table('admins')->where('id','=',$id)->select('password')->first();
            if (!Hash::check($oldpassword,$res->password)){
                $request->session()->flash('danger','旧密码错误');
                return redirect()->back()->withInput();
            }
            $data = array('password'=>bcrypt($password));
            $result = DB::table('admins')->where('id','=',$id)->update($data);
            if ($result){
                $request->session()->flash('success','修改密码成功');
                Auth::logout();
                return redirect()->route('admin.login');
            }
        }
        return view('admin.admin.mopwd');
    }
}
