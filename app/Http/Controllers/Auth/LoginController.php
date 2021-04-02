<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    //
    public function loginForm(){
        return Inertia::render('View/Signin');
    }

    public function doLogin(){
        
    }
}
