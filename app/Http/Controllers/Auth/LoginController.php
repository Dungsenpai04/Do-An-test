<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin(){
            if(Auth::check()){
                return redirect()->back();
            }
        return view ('auth.login');
    }

    public function login( LoginRequest $requets ) {
        $credentials = [
            'email'=>$requets->email,
            'password'=>$requets->password,
            'status'=> 1
        ];

        if (Auth::attempt($credentials)){
                return redirect()->route('admin.category.index');
        }
        return redirect()->back();
    }
}
 