<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
//        dd(1);
        $acts = Activity::paginate(4);
        return view('admin.activity.index',compact('acts'));
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'title'=>'required',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required'
            ]);
//            dd($request->post());
            Activity::create($request->post());
            $request->session()->flash('success','添加成功');
            return redirect()->route('activity.index');
        }
        return view('admin.activity.add');
    }
    public function edit(Request $request,$id){
        $act = Activity::findOrFail($id);
        $act['start_time'] = strtotime($act['start_time']);
        $act['end_time'] = strtotime($act['end_time']);
//        dd($act);
        if($request->isMethod('post')){
            $this->validate($request,[
                'title'=>'required',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required'
            ]);
            $act->update($request->post());
            $request->session()->flash('success','修改成功');
            return redirect()->route('activity.index');
        }
        return view('admin.activity.edit',compact('act'));
    }
    public function del(Request $request,$id){
        $act = Activity::findOrFail($id);
        $act->delete();
        $request->session()->flash('success','删除成功');
        return redirect()->route('activity.index');
    }
}
