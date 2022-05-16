<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index(Request $request) {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.index', ['data' => $data]);
    }

    public function post(Request $request) {
        $msg = $request->msg;
        $name = $request->name;
        $data = [
            'msg' => $msg,
            'name' => $name
        ];
        return view('hello.index', $data);
    }

}
