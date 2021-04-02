<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    //
    public function registerForm(){
        return Inertia::Render('View/Signup');
    }

    public function doRegister(Request $request){
        var_dump($request->all());
        
    }
    
}
