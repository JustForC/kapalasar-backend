<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        $check = Auth()->check();
        if($check){
            return redirect()->route('home');
        }
        $user = new User;
        return Inertia::render('View/Signin', [
            'check' => $check,
            'user' => $user,
            'csrf' => csrf_token()
        ]);
    }

    public function login(Request $request)
    {
        // $request->only('email','password');
        $credentials=[
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth()->guard()->attempt($credentials)){
            // dd($request);
            return redirect('/');
        }
        // dd($request, $credentials);
        return redirect()->back()->withInput($request->only('email', 'password', 'remember'))->withErrors([
            'password' => 'Password salah',
        ]);
    }
}