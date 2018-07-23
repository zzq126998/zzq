<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
        public function add(Request $request){
            //获取shop_category 的值
            $categorys = ShopCategory::all();
            if($request->isMethod("post")){
                $data = $request->post();
                $re = User::create($data);
                if($re){
                    //获取shop_category_id的值
                    $data['shop_category_id'] = $re->id;
                    Shop::create($data);
                }
            }
            return view("shop.user.add",compact('categorys'));
        }
        //首页显示
        public function index(){
            $users = User::all();
            return view('shop.user.index',compact('users'));
        }

        public function creat(Request $request){
            if($request->isMethod('post')){
                $data = $request->post();
                $this->validate($request,[
                    'name'=>'required',
                    'password'=>'required',
                    'email'=>'required'
                ]);
                $data['password'] = bcrypt($data['password']);
                User::create($data);
                $request->session()->flash('success','注册成功');
                return redirect()->route('user.index');
            }
            return view('shop.user.creat');
        }
        //编辑商户
        public function edit(Request $request,$id){
            $users = User::findOrFail($id);
            if($request->isMethod('post')){
                $users->update($request->post());
                $request->session()->flash('success','修改成功');
                return redirect()->route('user.index');
            }
            return view('shop.user.edit',compact('users'));
        }
        //删除商户
        public function del(Request $request,$id){
            $user = User::find($id);
            $user->delete();
            $request->session()->flash('success','删除成功');
            return redirect()->route('user.index');
        }
        public function login(Request $request){
            if($request->isMethod('post')){
                $this->validate($request,[
                    'name'=>'required',
                    'password'=>'required'
                ]);
//                dd($request->post());exit;
                if(Auth::attempt(['name'=>$request->post('name'),'password'=>$request->post('password')],$request->has('remember'))){
                    $request->session()->flash('success','登陆成功');
                    return redirect()->route('user.index');
                }else{
                    $request->session()->flash('danger','用户名或密码错误');
                    return redirect()->back()->withInput();
                }
            }
            return view('shop.user.login');
        }
        //注销登录
        public function logout(){
            Auth::logout();
            session()->flash('success', '您已成功退出！');
            return redirect()->route('user.login');
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
            $res = DB::table('users')->where('id','=',$id)->select('password')->first();
            if (!Hash::check($oldpassword,$res->password)){
                $request->session()->flash('danger','旧密码错误');
                return redirect()->back()->withInput();
            }

            $data = array('password'=>bcrypt($password));
            $result = DB::table('users')->where('id','=',$id)->update($data);
            if ($result){
                $request->session()->flash('success','修改密码成功');
                Auth::logout();
                return redirect()->route('user.login');
            }
        }
        return view('shop.user.mopwd');
    }
}
