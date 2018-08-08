<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPrizeController extends Controller
{
    public function index(){
        $events = EventPrize::paginate(4);
        return view('admin.eventPrize.index',compact('events'));
    }
    public function add(Request $request){
        $events = Event::all();
        if($request->isMethod('post')){
//            dd($request->post());
//            $this->validate($request,[
//                'event_id'=>'required',
//                'name'=>'required',
//                'description'=>'required',
//            ]);
             EventPrize::create($request->post());
            $request->session()->flash('success','添加成功');
            return redirect()->route('eventprize.index');
        }
        return view('admin.eventPrize.add',compact('events'));
    }
    public function edit(Request $request,$id){
        $events = Event::all();
        $even = EventPrize::findOrFail($id);
        $eventa = Event::where('id',$even['event_id'])->first();
//        dd($eventa['is_prize']);
        //判断活动是否已经开奖
        if($eventa['is_prize']===1){
            $request->session()->flash('danger','活动已经开奖，不能修改奖品');
            return redirect()->route('eventprize.index');
        }
        if($request->isMethod('post')){
            $this->validate($request,[
                'event_id'=>'required',
                'name'=>'required',
                'description'=>'required',
            ]);
            $even->update($request->post());
            $request->session()->flash('success','修改成功');
            return redirect()->route('eventprize.index');
        }
        return view('admin.eventPrize.edit',compact('even','events'));
    }
    public function del(Request $request,$id){
        $event = EventPrize::find($id);
        $eventa = Event::where('id',$event['event_id'])->first();
//        //判断活动是否已经开奖
        if($eventa['is_prize']===1){
            $request->session()->flash('danger','活动已经开奖，不能删除奖品');
            return redirect()->route('eventprize.index');
        }
        $event->delete();
        $request->session()->flash('success','删除成功');
        return redirect()->route('eventprize.index');
    }
}
