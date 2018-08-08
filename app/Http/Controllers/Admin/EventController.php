<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){
        $events = Event::paginate(4);
        return view('admin.event.index',compact('events'));
    }
    public function add(Request $request){
        if($request->isMethod('post')){
//            dd($request->post());
            $this->validate($request,[
                'title'=>'required',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
                'prize_time'=>'required',
                'num'=>'numeric',
            ]);
            Event::create($request->post());
            $request->session()->flash('success','添加成功');
            return redirect()->route('event.index');
        }
        return view('admin.event.add');
    }
    public function edit(Request $request,$id){
        $event = Event::findOrFail($id);
        $event['start_time'] = strtotime($event['start_time']);
        $event['end_time'] = strtotime($event['end_time']);
        $event['prize_time'] = strtotime($event['prize_time']);
        if($request->isMethod('post')){
            $this->validate($request,[
                'title'=>'required',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
                'prize_time'=>'required',
                'num'=>'numeric',
            ]);
            $event->update($request->post());
            $request->session()->flash('success','修改成功');
            return redirect()->route('event.index');
        }
        return view('admin.event.edit',compact('event'));
    }
    public function del(Request $request,$id){
        $event = Event::find($id);
        $event->delete();
        $request->session()->flash('success','删除成功');
        return redirect()->route('event.index');
    }
}
