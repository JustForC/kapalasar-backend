<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Checkout;
use App\Models\Cost;

class HomeController extends Controller
{
    public function index()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                $products = Product::with('categories')->get();
                foreach($products as $product){
                    if($product->discount_price){
                        $product->new_price = $product->discount_price;
                        $product->price = $product->price;
                    }
                    else{
                        $product->new_price = $product->price;
                        $product->price = null;
                    }
                }
                return Inertia::render('View/Homepage', [
                    'check' => true,
                    'user' => $user,
                    'real_products' => $products
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
        $products = Product::with('categories')->get();
        foreach($products as $product){
            if($product->discount_price){
                $product->new_price = $product->discount_price;
                $product->price = $product->price;
            }
            else{
                $product->new_price = $product->price;
                $product->price = null;
            }
        }
        return Inertia::render('View/Homepage', [
            'check' => $check,
            'user' => null,
            'real_products' => $products
        ]);
    }

    public function checkout()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                $products = Product::with('categories')->get();
                foreach($products as $product){
                    if($product->discount_price){
                        $product->new_price = $product->discount_price;
                        $product->price = $product->price;
                    }
                    else{
                        $product->new_price = $product->price;
                        $product->price = null;
                    }
                }
                return Inertia::render('View/Checkout', [
                    'check' => true,
                    'user' => $user,
                    'real_products' => $products
                ]);
            }
            else if(Auth()->user()->roles->name == 'Super Admin'){
                return 'super admin';
            }
        }
        $user = new User;
        $products = Product::with('categories')->get();
        $vouchers = Voucher::with('types')->get();
        foreach($products as $product){
            if($product->discount_price){
                $product->new_price = $product->discount_price;
                $product->price = $product->price;
            }
            else{
                $product->new_price = $product->price;
                $product->price = null;
            }
        }
        return Inertia::render('View/Checkout', [
            'check' => $check,
            'user' => null,
            'real_products' => $products,
            'real_vouchers' => $vouchers
        ]);
    }

    public function payment()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                $vouchers = Voucher::with('types')->get();
                $products = Product::with('categories')->get();
                foreach($products as $product){
                    if($product->discount_price){
                        $product->new_price = $product->discount_price;
                        $product->price = $product->price;
                    }
                    else{
                        $product->new_price = $product->price;
                        $product->price = null;
                    }
                }
                return Inertia::render('View/Payment', [
                    'check' => true,
                    'user' => $user,
                    'real_products' => $products,
                    'real_vouchers' => $vouchers
                ]);
            }
            else if(Auth()->user()->roles->name == 'Super Admin'){
                return 'super admin';
            }
        }
        $user = new User;
        $vouchers = Voucher::with('types')->get();
        $products = Product::with('categories')->get();
        foreach($products as $product){
            if($product->discount_price){
                $product->new_price = $product->discount_price;
                $product->price = $product->price;
            }
            else{
                $product->new_price = $product->price;
                $product->price = null;
            }
        }
        return Inertia::render('View/Payment', [
            'check' => $check,
            'user' => null,
            'real_products' => $products,
            'real_vouchers' => $vouchers
        ]);
    }

    public function finish(Request $request)
    {
        $check = Auth()->check();
        if($check){
            $user = Auth()->user();
            $user = User::find($user->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            $user = Auth()->user();
            $checkout = Checkout::create([
                'users_id' => $user->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $request->price,
                'status' => 1,
                'type' => 0,
                'discount' => 0
            ]);
            foreach($request->cart as $cart){
                $product = Product::find($cart['id']);
                if($product->discount_price){
                    $cost = Cost::create([
                        'checkouts_id' => $checkout->id,
                        'product' => $product->name,
                        'amount' => $cart['qty'],
                        'price' => $product->discount_price
                    ]);
                }
                else{
                    $cost = Cost::create([
                        'checkouts_id' => $checkout->id,
                        'product' => $product->name,
                        'amount' => $cart['qty'],
                        'price' => $product->price
                    ]);
                }
            }
            return redirect()->route('home')->with('checkout', $checkout);;

        }
        
        dd($request);
    }

    public function account()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                $products = Product::with('categories')->get();
                foreach($products as $product){
                    if($product->discount_price){
                        $product->new_price = $product->discount_price;
                        $product->price = $product->price;
                    }
                    else{
                        $product->new_price = $product->price;
                        $product->price = null;
                    }
                }
                $checkouts = Checkout::where('users_id', $user->id)->first();
                return Inertia::render('View/Account', [
                    'check' => true,
                    'user' => $user,
                    'real_products' => $products,
                    'checkouts' => $checkouts
                ]);
            }
            return view('/dashboard/index');
        }
        return redirect()->route('login');
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
