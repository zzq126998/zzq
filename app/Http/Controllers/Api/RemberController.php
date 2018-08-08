<?php

namespace App\Http\Controllers\Api;

use App\Models\Rember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Mrgoon\AliSms\AliSms;

class RemberController extends Controller
{
    //获取验证码
    public function sms(){

//        dd(cache("tel_2234"));
        //return 111;
        $tel = \request()->input('tel');
       // dd($tel);
        $config = [
            'access_key' => 'LTAIKffmJpYco0bb',
            'access_secret' => 'qbKyJg0orThMTnbZsUezqz1Gk8BlDE',
            'sign_name' => '周智强',
        ];
        $code = rand(1000,9999);
        //Redis::setex('tel_'.$tel,300,$code);
        cache(['tel_'.$tel=>$code],300);
        $aliSms = new AliSms();
        $response = $aliSms->sendSms($tel, 'SMS_140680121', ['code'=> $code], $config);
        if($response->Message === 'OK'){
            return [
                'status'=>'true',
                'message'=>'短信发送成功'+$code
            ];
        }else{
            return [
                'status'=>'false',
                'message'=>$response->Message
            ];
        }
    }

    //注册
    public function reg(Request $request){
//        return 111;
            $data = $request->input();
            $validate = Validator::make($data,[
                'username'=>'required|unique:rembers',
                'tel'=>[
                    'required',
                    'unique:rembers',
                    'regex:/^0?(13|14|15|18|17)[0-9]{9}$/'
                ]
            ]);
            //加密密码
            $data['password'] = bcrypt($data['password']);
            //取出redias里存的验证码
            $sms = cache('tel_'.$data['tel']);
//            dd($data['sms']);
            //判断验证码是否正确
            if($sms==$data['sms']){
                Rember::create($data);
                return [
                    'status'=>'true',
                    'message'=>'注册成功'
                ];
            }else{
                return[
                    'status'=>'false',
                    'message'=>'验证码错误'
                ];
            }
        }

    //登录
    public function login(Request $request){
        $data = $request->input();
        $re = Rember::where('username',$data['name'])->first();
        if($re && Hash::check($data['password'],$re->password)){
            return [
                'status'=>'true',
                'message'=>'登陆成功',
                'user_id'=>$re->id,
                'username'=>$re->username
            ];
        }else{
            return [
                'status'=>'false',
                'message'=>'账号或密码错误'
            ];
        }
    }

    //修改密码
    public function change(Request $request){
        $data = $request->post();
        $rember = Rember::where('id',$data['id'])->first();
        if(!Hash::check($data['oldPassword'],$rember->password)){
            return [
                'status'=>'false',
                'message'=>'旧密码错误'
            ];
        }
        $rember->password=bcrypt($data['newPassword']);
        if($rember->save()){
            return [
                'status'=>'true',
                'message'=>'修改密码成功'
            ];
        }
    }

    //重置密码
    public function reset(Request $request){
            $data = $request->post();
//            dd($data);
            $sms = cache('tel_'.$data['tel']);
            $rember = Rember::where('tel',$data['tel'])->first();
//            dd($rember);
            if(!$sms==$data['sms']){
                return [
                    'status'=>'false',
                    'message'=>'验证码错误'
                ];
            }
            $rember->password=bcrypt($data['password']);
            if($rember->save()){
                return [
                    'status'=>'true',
                    'message'=>'重置密码成功'
                ];
            }
        }
    public function detail(Request $request){
        return Rember::find($request->input('user_id'));
    }

}
