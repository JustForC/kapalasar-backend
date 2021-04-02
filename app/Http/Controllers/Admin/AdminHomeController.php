<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use Validator;

class AdminHomeController extends Controller
{
    //
    public function getHome(){
        return view('admin/home');
    }

    public function editTransaction(){

    }

    public function deleteTransaction(){

    }
    
}
