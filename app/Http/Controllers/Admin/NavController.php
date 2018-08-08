<?php

namespace App\Http\Controllers\Admin;

use App\Models\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class NavController extends Controller
{
        public function index(){

        }

        public function add(Request $request){
            if($request->isMethod('post')){
                $this->validate($request,[
                    'name'=>'required'
                ]);
                $data = $request->post();
//                dd($data);
                $nav = Navs::create($data);
                return redirect()->refresh()->with('success','添加'.$nav->name.'成功');
            }
            //得到所有权限
            $routes = Route::getRoutes();
            //声明一个空数组来存数据
            $urls = [];
            foreach ($routes as $route){
                if($route->action['namespace']==="App\Http\Controllers\Admin"){
                    if (isset($route->action['as'])){
                        $urls[]=$route->action['as'];
                    }
                }
            }
            $navs=Navs::where('parent_id',0)->orderBy('sort')->get();
            return view('admin.nav.add',compact('navs','urls'));
        }

        public function edit(){

        }

        public function del(){

        }
}
