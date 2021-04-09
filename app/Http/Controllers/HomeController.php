<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Models\Checkout;
use App\Models\Voucher;

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
            elseif(Auth()->user()->roles->name == 'Merchant'){
                $user = Auth()->user();
                $transactions = Checkout::with('users','vouchers')->where('referral_code','=',Auth()->user()->referral_code)->get();
                return view('/merchant/dashboard/index',['transactions' => $transactions]);
            }
            $transactions = Checkout::with('users','vouchers')->orderBy('updated_at')->take(5);
            return view('/dashboard/index',['transactions' => $transactions]);
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
