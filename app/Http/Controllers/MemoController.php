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
        $data = $request -> all();
        // dd($data);

        if($request->has('save')){//ログインユーザーメモ新規登録
            Memo::insertGetId([
                'user_id'=>$data['user_id'],
                'memo'=>$data['memo'],
                'status'=>1,
             ]);
        }
        return redirect()->route('memo');
    }

    public function memo()
    {
        $user = auth()->user();
        return Memo::where('user_id', $user['id'])->first()->memo ??null;
    }
    
 
}
