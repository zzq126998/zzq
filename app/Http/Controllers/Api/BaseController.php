<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        //设置header头 解决跨域问题
        header('Access-Control-Allow-Origin:*');
    }
}
