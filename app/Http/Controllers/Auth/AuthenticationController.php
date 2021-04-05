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

    }

    public function doLogin(Request $request){

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
