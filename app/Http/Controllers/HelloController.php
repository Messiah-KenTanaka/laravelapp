<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use App\Models\Person;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\ClassIsFinalException;

class HelloController extends Controller
{
    //
    public function index(Request $request) 
    {
        $user = Auth::user();
        $sort = $request->sort;
        $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        return view('hello.index', $param);
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

    public function rest()
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインしてください'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'passeord' => $password])) {
            $msg = 'ログインしました ('. Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました';
        }

        // dd($email, $password, $msg);
        return view('hello.auth', ['message' => $msg]);
    }
}

