<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LogoutController extends Controller
{
    //
    public function doLogout(){
        Auth::logout();
        return redirect('/login');
    }
}
