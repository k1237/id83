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
        return Idea::where('user_id', $user['id'])->get();
    }
}


