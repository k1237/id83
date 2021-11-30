<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $user = Auth::user();
        return view('memos',compact('user'));
    }

    public function user(Request $request)
    {
       return ['name',Auth::user()];
       return $request->user();
    }
}
