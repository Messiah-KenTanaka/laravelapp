<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\ClassIsFinalException;

class HelloController extends Controller
{
    //
    public function index(Request $request) 
    {
        $items = DB::table('pepple')->get();
        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request) 
    {
        $items = DB::select('select * from pepple');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('pepple')
            ->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $item = DB::table('pepple')
            ->where('id', $request->id)
            ->first();
            return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('pepple')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $item = DB::table('pepple')
            ->where('id', $request->id)
            ->first();
            return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('pepple')
            ->where('id', $request->id)
                ->delete();
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('pepple')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }
}
