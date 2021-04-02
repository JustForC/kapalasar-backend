<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function getUser(){
        $users = User::where('role_id','=',3)->get();
        return view('superAdmin/User',['users' => $users]);
    }

    public function editUser(){

    }

    public function deleteUser(){

    }
    
}
