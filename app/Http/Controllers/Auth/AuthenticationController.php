<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;
use Hash;

class AuthenticationController extends Controller
{
    //
    public function registerForm(){
        return Inertia::render('');
    }

    public function doRegister(Request $request){
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'address_detail' => "Kelurahan ".$request->kelurahan." Kecamatan ".$request->kecamatan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'phone' => $request->phone,
            'job' => $request->job,
            'roles_id' => 4,
        ]);
        
        return redirect('/login');
    }

    public function loginForm(){
        return Inertia::render('');
    }

    public function doLogin(Request $request){
        $request->only('email','password');
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard()->attempt($credentials)){
            if (Auth::user()->roles->name == "User"){
                return Inertia::render('');
            }
            elseif(Auth::user()->roles->name == "Admin"){
                return view('');
            }
            elseif(Auth::user()->roles->name == "Super Admin"){
                return view('');
            }
            elseif(Auth::user()->roles->name == "Merchant"){
                return view('');
            }
        }
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/login');
    }

    public function merchantForm(){

    }

    public function registerMerchant(Request $request){

    }
}
