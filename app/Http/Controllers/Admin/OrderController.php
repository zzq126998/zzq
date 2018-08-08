<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        $date[] = $request->input('show');
        if($request->input('show') === null){
            $date =  Shop::all()->pluck('id')->toArray();
        }
        $sums = Order::select(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d" ) AS date,shop_id, SUM(total) AS money, count(*) AS count '))->whereIn('shop_id',$date)->groupBy('date')->get();
        $shops=Shop::all();
        return view('admin.order.index',compact('shops','sums'));
    }
}
