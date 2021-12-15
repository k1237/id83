<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Memo;


class MemoController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return view('memos');
    }

    public function save(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
        // dd($user);

        if ($data['memo'] != "" && $request->has('save')) {
            Memo::insertGetId([
                'user_id' => $user['id'],
                'memo' => $data['memo'],
                'status' => 1,
            ]);
        } elseif ($request->has('update')) {
            Memo::where('user_id', $user['id'])->update([
                'memo' => $data['memo'],
            ]);
        } elseif ($request->has('delete')) {
            Memo::where('user_id', $user['id'])->delete();
        }
        return redirect('/memo');
    }

    public function memo()
    {
        //これだと反映される
        // return Memo::first()->memo;
        $user = auth()->user();
        $memo =Memo::where('user_id', 1)->first()->memo;
        return $memo;
    }
}
