<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use App\User;
use Auth;

class LoginController extends Controller
{
    //
    public function home(){
        $check = Auth::check();
        if($check == true){
            $user = Auth::user();
            return Inertia::render('View/Homepage',[
                'check' => $check,
                'user' => $user
            ]);
        }
        return Inertia::render('View/Homepage',[
            'check' => $check,
        ]);
    }
    public function loginForm(){
        return Inertia::render('View/Signin');
    }

    public function doLogin(Request $request){
        $request->only('email','password');
        $credentials=[
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
                return "Merchant";
            }
            elseif(Auth::user()->role_id == 3){
                return redirect('/');
            }
        }

        return redirect('/login');

    }
}
