<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class ScheduleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return view('schedules');
    }

    public function idea()
    {
        $user = auth()->user();
        return Idea::where('user_id', $user['id'])->where('status',1)->get();
    }

    public function store(Request $request)
    {
        $data = $request -> all();
        // dd($data);

        if($request->has('store')){
            Idea::where('id',$data['id'])->update([
                'status'=>2,
            ]);
        }elseif($request->has('delete')){
            Idea::where('id',$data['id'])->delete();
        }
        return redirect('/schedule');
    }
}


