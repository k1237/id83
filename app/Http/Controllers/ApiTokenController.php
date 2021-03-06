<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ApiTokenController extends Controller
{
     /**
     * 認証済みのユーザーのAPIトークンを更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(80);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
        
        session()->put('api_token', $token);
        return redirect('/home');
    }
}
