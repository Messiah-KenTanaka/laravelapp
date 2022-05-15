<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index(Request $request) {
        $data = [
            'msg' => 'これはBladeを利用したコントローラから渡されたメッセージです。',
        ];
        return view('hello.index', $data);
    }

    public function post(Request $request) {
        $msg = $request->msg;
        $data = [
            'msg' => '今日は,' . $msg . 'さん！',
        ];
        return view('hello.index', $data);
    }

}
