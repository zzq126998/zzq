<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressController extends BaseController
{
    //添加地址
    public function address(Request $request){
        $data = $request->post();
        $validate = Validator::make($data,[
            'name'=>'required',
        ]);
        if (Address::create($data)){
            return [
                'status'=>'true',
                'message'=>'添加地址成功'
            ];
        }
    }
    //列表显示
    public function index(Request $request){
//        dd(user_id);
        $id = $request->input('user_id');
        $data = Address::where('user_id',$id)->get();
        return $data;
    }
    //编辑回显
    public function display(Request $request){
        $id = $request->input('id');
        $data = Address::where('id',$id)->first();
        return $data;
    }
    //修改地址
    public function edit(Request $request){
        $data = $request->post();
        $address = Address::where('id',$data['id'])->first();
//        dd($data);
        if($address->update($data)){
            return[
                'status'=>'true',
                'message'=>'修改地址成功'
            ];
        }

    }
}
