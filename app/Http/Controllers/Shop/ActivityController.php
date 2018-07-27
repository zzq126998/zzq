<?php

namespace App\Http\Controllers\Shop;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index(){
        $query = Activity::orderBy('id');
        $time = date('Y-m-d',time());
//        dd($time);
        $acts = $query->where('start_time','<=',$time)->where('end_time','>=',$time)->paginate(4);
//        dd($acts);
        return view('shop.activity.index',compact('acts'));
    }
    public function look($id){
        $act = Activity::findOrFail($id);
        return view('shop.activity.look',compact('act'));
    }
}
