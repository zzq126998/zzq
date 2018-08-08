<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('login','add');
        $this->middleware('guest:admin')->only('login');
        //设置header头 解决跨域问题
        header('Access-Control-Allow-Origin:*');

        //判断用户有没有权限

//        $this->middleware(function ($request,\Closure $next){
//            $admin = Auth::guard('admin')->user();
//            if (!in_array(Route::currentRouteName(), ['admin.login', 'admin.logout']) && $admin->id !== 1) {
//                if ($admin->can(Route::currentRouteName()) === false) {
//                    //显示视图 不能用return 只能exit
//                    exit(view('admin.curr'));
//                }
//            }
//            return $next($request);
//        });
    }
}
