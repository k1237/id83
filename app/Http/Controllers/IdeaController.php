<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return view('ideas');
    }

    public function add(Request $request){
        $data = $request -> all();
        // dd($data);
        
        // $validate_rule=[
        //     'user_id' =>'required',
        //     'idea_text' => 'required|max:20',
        //  ];
        // $this->validate($request,$validate_rule);

        if($data['idea_text']!=""&&$request->has('add')){//ログインユーザーメモ新規登録
               Idea::insertGetId([
                    'user_id'=>$data['user_id'],
                    'idea'=>$data['idea_text'],
                    'status'=>1,
                ]);
            }else{
                //空白の場合何もしない
            }
        return redirect()->route('idea');
    
    }
}
