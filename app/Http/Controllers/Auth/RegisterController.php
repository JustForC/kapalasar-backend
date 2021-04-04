<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    //
    public function registerForm(){
        return Inertia::Render('View/Signup');
    }

    public function doRegister(Request $request){
        var_dump($request->all());
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'address' => ['required'],
            'district' => ['required'],
            'subdistrict' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
            'age' => ['required'],
            'job' => ['required'],
            'telephone' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'job' => $request->job,
            'address_detail' =>"Kelurahan ".$request->district." "."Kecamatan ".$request->subdistrict,
            'address' => $request->address,
            'telephone' => $request->name,
            'role_id' => 3,
        ]);

        return redirect('/login');

    }
    
}
