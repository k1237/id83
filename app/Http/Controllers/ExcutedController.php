<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class ExcutedController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return view('excuteds');
    }

    public function idea2()
    {
        $user = auth()->user();
        return Idea::where('user_id', $user['id'])->where('status',2)->get();
    }

    public function delete(Request $request){
        $data = $request -> all();
        // dd($data);
        if($request->has('delete')){
            Idea::where('id',$data['id'])->delete();
        }
        return redirect()->route('excuted');
    }

}
