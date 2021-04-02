<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getHome(){
        return view('superAdmin/index');
    }

    public function deleteTransaction(){

    }

    public function editTransaction(){
        
    }
}
