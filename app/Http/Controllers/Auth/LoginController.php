<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function loginForm(){
        return Inertia::render('View/Signin');
    }

    public function doLogin(Request $request){
        $request->only('email','password');
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard()->attempt($credentials)){
            if(Auth::user()->role_id == 0){
                return redirect('/superadmin/home');
            }
            elseif(Auth::user()->role_id == 1){
                return redirect('/admin/home');
            }
            elseif(Auth::user()->role_id == 2){
                return redirect('/merchant/home');
            }
            elseif(Auth::user()->role_id == 3){
                return redirect('/home');
            }
        }
    }
}
