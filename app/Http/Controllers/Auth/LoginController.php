<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/api/token'; 
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $user = auth()->user()?? null;

        // User::where('id', $user['id']??null)->update([
        //     'api_token' => null,
        // ]);

        $this->middleware('guest')->except('logout');  
    }
}
