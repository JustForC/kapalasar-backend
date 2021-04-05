<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AuthenticationController extends Controller
{
    //
    public function registerForm(){

    }

    public function doRegister(Request $request){

    }

    public function loginForm(){

    }

    public function doLogin(Request $request){

    }

    public function doLogout(){
        Auth::logout();
        return redirect('/login');
    }
}
