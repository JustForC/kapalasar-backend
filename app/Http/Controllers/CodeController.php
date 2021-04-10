<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Checkout;
use App\Models\Cost;

class CodeController extends Controller
{
    public function index($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
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
                    return Inertia::render('Code/Home', [
                        'code' => $code,
                        'check' => true,
                        'user' => $user,
                        'real_products' => $products
                    ]);
                }
                return redirect()->route('home');
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
            return Inertia::render('Code/Home', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'real_products' => $products
            ]);
        }
        else{
            abort(404);
        }
    }

    public function checkout($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
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
                    return Inertia::render('Code/Checkout', [
                        'code' => $code,
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
            return Inertia::render('Code/Checkout', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'real_products' => $products,
                'real_vouchers' => $vouchers
            ]);
        }
        else{
            abort(404);
        }
    }

    public function payment($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
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
                    return Inertia::render('Code/Payment', [
                        'code' => $code,
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
            return Inertia::render('Code/Payment', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'real_products' => $products,
                'real_vouchers' => $vouchers
            ]);
        }
        else{
            abort(404);
        }
    }

    public function finish(Request $request, $code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
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
                return redirect()->route('code.index', $code)->with('checkout', $checkout);;
            }

            $checkout = Checkout::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $request->price,
                'status' => 1,
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
            return redirect()->route('code.index', $code)->with('checkout', $checkout);;
        }
        else{
            abort(404);
        }
    }

    public function account($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
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
        else{
            abort(404);
        }
    }

    public function flash_sale($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
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
        else{
            abort(404);
        }
    }

    public function registerShow($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            $check = Auth()->check();
            if($check){
                return redirect()->route('code.home', $code);
            }
            $user = new User;
            return Inertia::render('Code/Register', [
                'code' => $code,
                'check' => $check,
                'user' => $user
            ]);
        }
        else{
            abort(404);
        }
    }

    public function register(Request $request, $code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            //Error messages
            $messages = [
                'name.required' => 'Nama tidak boleh kosong',
                'phone.required' => 'Nomor Telepon tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email harus benar',
                'email.unique' => "Email ini sudah ada yang pakai",
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'password.required' => 'Password tidak boleh kosong',
            ];

            // validate the form data
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'min:8'],
                'name' => ['required'],
                'phone' => ['required']
            ], $messages);
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            else{
                $user = User::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'roles_id' => 4
                ]);
                Auth::login($user);
                return redirect()->route('code.home', $code);
            }
        }
        else{
            abort(404);
        }
    }

    public function loginShow($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            $check = Auth()->check();
            if($check){
                return redirect()->route('code.home', $code);
            }
            $user = new User;
            return Inertia::render('Code/Login', [
                'code' => $code,
                'check' => $check,
                'user' => $user
            ]);
        }
        else{
            abort(404);
        }
    }

    public function login(Request $request, $code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            $credentials=[
                'email' => $request->email,
                'password' => $request->password,
            ];
            if(Auth()->guard()->attempt($credentials)){
                return redirect('/');
            }
            return redirect()->back()->withInput($request->only('email', 'password', 'remember'))->withErrors([
                'password' => 'Password salah',
            ]);
        }
        else{
            abort(404);
        }
    }
}
