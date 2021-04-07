<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                return Inertia::render('View/Homepage', [
                    'check' => true,
                    'user' => $user
                ]);
            }
            return view('/dashboard/index');
        }
        $user = new User;
        return Inertia::render('View/Homepage', [
            'check' => $check,
            'user' => null
        ]);
    }

    public function checkout()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                return Inertia::render('View/Checkout', [
                    'check' => true,
                    'user' => $user
                ]);
            }
            else if(Auth()->user()->roles->name == 'Super Admin'){
                return 'super admin';
            }
        }
        $user = new User;
        return Inertia::render('View/Checkout', [
            'check' => $check,
            'user' => null
        ]);
    }

    public function flash_sale()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                return Inertia::render('View/Flashsale', [
                    'check' => true,
                    'user' => $user
                ]);
            }
            else if(Auth()->user()->roles->name == 'Super Admin'){
                return 'super admin';
            }
        }
        $user = new User;
        return Inertia::render('View/Flashsale', [
            'check' => $check,
            'user' => null
        ]);
    }

    public function code($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            $check = Auth()->check();
            if($check){
                if(Auth()->user()->roles->name == 'User'){
                    $user = Auth()->user();
                    return Inertia::render('View/Homepage', [
                        'check' => true,
                        'user' => $user
                    ]);
                }
                else if(Auth()->user()->roles->name == 'Super Admin'){
                    return view('/dashboard/index');
                }
            }
            $user = new User;
            return Inertia::render('View/Homepage', [
                'check' => $check,
                'user' => null
            ]);
        }
        abort(404);
    }

}
