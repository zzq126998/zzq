<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
        public function __construct()
        {
            $this->middleware("auth")->except('login','index');
            $this->middleware('guest',[
                'only'=>['login']
            ]);
            //设置header头 解决跨域问题
            header('Access-Control-Allow-Origin:*');
        }
}
