<?php

namespace App\Http\Controllers\Shop;

use App\Models\Event;
use App\Models\EventMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventMemberController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('shop.eventmember.index',compact('events'));
    }
    public function sign(Request $request,$id){
        $event = Event::find($id);
//        dd(strtotime($event['start_time']));
//        $time = date('Y-m-d',time());
        if(time()<strtotime($event['start_time']) || time()>strtotime($event['end_time'])){
//            dd(1);
            $request->session()->flash('danger','该活动未开始或者已结束');
            return redirect()->route('eventmember.index');
        }
//        dd($time);
        $data['event_id'] = $id;
        $data['user_id'] = Auth::user()->id;
//                dd($user_id);
        EventMember::create($data);
        $request->session()->flash('danger','报名成功');
        return redirect()->route('eventmember.index');
    }
    //查看详情
    public function detail(Request $request,$id){

    }

}
