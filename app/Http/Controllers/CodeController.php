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
use App\Models\Advertisement;
use App\Models\FlashSale;
use Carbon\Carbon;

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
                    $banners = Advertisement::get()->reject(function($query){
                        if($query->id == 1) return true;
                    });
                    $popUp = Advertisement::find(1);
    
                    $products = Product::with('categories')->get();
                    $i=0;
                    foreach($products as $product){
                        $all_products[$i]['id'] = $product->uniq;
                        $all_products[$i]['name'] = $product->name;
                        $all_products[$i]['unit'] = $product->unit;
                        $all_products[$i]['category'] = $product->categories->name;
                        $all_products[$i]['stock'] = $product->stock;
                        $all_products[$i]['image'] = $product->image;
                        if($product->discount_price){
                            $all_products[$i]['new_price'] = $product->discount_price;
                            $all_products[$i]['price'] = $product->price;
                        }
                        else{
                            $all_products[$i]['new_price'] = $product->price;
                            $all_products[$i]['price'] = null;
                        }
                        $all_products[$i]['flash_sale'] = false;
                        $i++;
                    }
            
                    $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
                    foreach($flash_sale_products as $flash_sale_product){
                        $all_products[$i]['id'] = $flash_sale_product->uniq;
                        $all_products[$i]['name'] = $flash_sale_product->products->name;
                        $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                        $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                        $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                        $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                        $all_products[$i]['price'] = $flash_sale_product->products->price;
                        if($flash_sale_product->image == null){
                            $all_products[$i]['image'] = $flash_sale_product->products->image;
                        }
                        else{
                            $all_products[$i]['image'] = $flash_sale_product->image;
                        }
                        $all_products[$i]['flash_sale'] = true;
                        $i++;
                    }
                    return Inertia::render('Code/Home', [
                        'code' => $code,
                        'check' => true,
                        'user' => $user,
                        'banners' => $banners,
                        'popUp' => $popUp,
                        'all_products' => $all_products
                    ]);
                }
                return redirect()->route('home');
            }
            $user = new User;
            $banners = Advertisement::get()->reject(function($query){
                if($query->id == 1) return true;
            });
            $popUp = Advertisement::find(1);
    
            $products = Product::with('categories')->get();
            $i=0;
            foreach($products as $product){
                $all_products[$i]['id'] = $product->uniq;
                $all_products[$i]['name'] = $product->name;
                $all_products[$i]['unit'] = $product->unit;
                $all_products[$i]['category'] = $product->categories->name;
                $all_products[$i]['stock'] = $product->stock;
                $all_products[$i]['image'] = $product->image;
                if($product->discount_price){
                    $all_products[$i]['new_price'] = $product->discount_price;
                    $all_products[$i]['price'] = $product->price;
                }
                else{
                    $all_products[$i]['new_price'] = $product->price;
                    $all_products[$i]['price'] = null;
                }
                $all_products[$i]['flash_sale'] = false;
                $i++;
            }
    
            $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
            foreach($flash_sale_products as $flash_sale_product){
                $all_products[$i]['id'] = $flash_sale_product->uniq;
                $all_products[$i]['name'] = $flash_sale_product->products->name;
                $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                $all_products[$i]['price'] = $flash_sale_product->products->price;
                if($flash_sale_product->image == null){
                    $all_products[$i]['image'] = $flash_sale_product->products->image;
                }
                else{
                    $all_products[$i]['image'] = $flash_sale_product->image;
                }
                $all_products[$i]['flash_sale'] = true;
                $i++;
            }
    
            return Inertia::render('Code/Home', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'banners' => $banners,
                'popUp' => $popUp,
                'all_products' => $all_products
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
                    $vouchers = Voucher::with('types')->get();

                    $products = Product::with('categories')->get();
                    $i=0;
                    foreach($products as $product){
                        $all_products[$i]['id'] = $product->uniq;
                        $all_products[$i]['name'] = $product->name;
                        $all_products[$i]['unit'] = $product->unit;
                        $all_products[$i]['category'] = $product->categories->name;
                        $all_products[$i]['stock'] = $product->stock;
                        $all_products[$i]['image'] = $product->image;
                        if($product->discount_price){
                            $all_products[$i]['new_price'] = $product->discount_price;
                            $all_products[$i]['price'] = $product->price;
                        }
                        else{
                            $all_products[$i]['new_price'] = $product->price;
                            $all_products[$i]['price'] = null;
                        }
                        $all_products[$i]['flash_sale'] = false;
                        $i++;
                    }
            
                    $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
                    foreach($flash_sale_products as $flash_sale_product){
                        $all_products[$i]['id'] = $flash_sale_product->uniq;
                        $all_products[$i]['name'] = $flash_sale_product->products->name;
                        $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                        $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                        $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                        $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                        $all_products[$i]['price'] = $flash_sale_product->products->price;
                        if($flash_sale_product->image == null){
                            $all_products[$i]['image'] = $flash_sale_product->products->image;
                        }
                        else{
                            $all_products[$i]['image'] = $flash_sale_product->image;
                        }
                        $all_products[$i]['flash_sale'] = true;
                        $i++;
                    }

                    return Inertia::render('Code/Checkout', [
                        'code' => $code,
                        'check' => true,
                        'user' => $user,
                        'real_vouchers' => $vouchers,
                        'all_products' => $all_products
                    ]);
                }
                else if(Auth()->user()->roles->name == 'Super Admin'){
                    return 'super admin';
                }
            }
            $user = new User;
            $vouchers = Voucher::with('types')->get();

            $products = Product::with('categories')->get();
            $i=0;
            foreach($products as $product){
                $all_products[$i]['id'] = $product->uniq;
                $all_products[$i]['name'] = $product->name;
                $all_products[$i]['unit'] = $product->unit;
                $all_products[$i]['category'] = $product->categories->name;
                $all_products[$i]['stock'] = $product->stock;
                $all_products[$i]['image'] = $product->image;
                if($product->discount_price){
                    $all_products[$i]['new_price'] = $product->discount_price;
                    $all_products[$i]['price'] = $product->price;
                }
                else{
                    $all_products[$i]['new_price'] = $product->price;
                    $all_products[$i]['price'] = null;
                }
                $all_products[$i]['flash_sale'] = false;
                $i++;
            }
    
            $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
            foreach($flash_sale_products as $flash_sale_product){
                $all_products[$i]['id'] = $flash_sale_product->uniq;
                $all_products[$i]['name'] = $flash_sale_product->products->name;
                $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                $all_products[$i]['price'] = $flash_sale_product->products->price;
                if($flash_sale_product->image == null){
                    $all_products[$i]['image'] = $flash_sale_product->products->image;
                }
                else{
                    $all_products[$i]['image'] = $flash_sale_product->image;
                }
                $all_products[$i]['flash_sale'] = true;
                $i++;
            }
    
            return Inertia::render('Code/Checkout', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'real_vouchers' => $vouchers,
                'all_products' => $all_products
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
                    $i=0;
                    foreach($products as $product){
                        $all_products[$i]['id'] = $product->uniq;
                        $all_products[$i]['name'] = $product->name;
                        $all_products[$i]['unit'] = $product->unit;
                        $all_products[$i]['category'] = $product->categories->name;
                        $all_products[$i]['stock'] = $product->stock;
                        $all_products[$i]['image'] = $product->image;
                        if($product->discount_price){
                            $all_products[$i]['new_price'] = $product->discount_price;
                            $all_products[$i]['price'] = $product->price;
                        }
                        else{
                            $all_products[$i]['new_price'] = $product->price;
                            $all_products[$i]['price'] = null;
                        }
                        $all_products[$i]['flash_sale'] = false;
                        $i++;
                    }
            
                    $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
                    foreach($flash_sale_products as $flash_sale_product){
                        $all_products[$i]['id'] = $flash_sale_product->uniq;
                        $all_products[$i]['name'] = $flash_sale_product->products->name;
                        $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                        $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                        $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                        $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                        $all_products[$i]['price'] = $flash_sale_product->products->price;
                        if($flash_sale_product->image == null){
                            $all_products[$i]['image'] = $flash_sale_product->products->image;
                        }
                        else{
                            $all_products[$i]['image'] = $flash_sale_product->image;
                        }
                        $all_products[$i]['flash_sale'] = true;
                        $i++;
                    }

                    return Inertia::render('Code/Payment', [
                        'code' => $code,
                        'check' => true,
                        'user' => $user,
                        'real_vouchers' => $vouchers,
                        'all_products' => $all_products,
                        'csrf' => csrf_token()
                    ]);
                }
                else if(Auth()->user()->roles->name == 'Super Admin'){
                    return 'super admin';
                }
            }
            $user = new User;

            $vouchers = Voucher::with('types')->get();

            $products = Product::with('categories')->get();
            $i=0;
            foreach($products as $product){
                $all_products[$i]['id'] = $product->uniq;
                $all_products[$i]['name'] = $product->name;
                $all_products[$i]['unit'] = $product->unit;
                $all_products[$i]['category'] = $product->categories->name;
                $all_products[$i]['stock'] = $product->stock;
                $all_products[$i]['image'] = $product->image;
                if($product->discount_price){
                    $all_products[$i]['new_price'] = $product->discount_price;
                    $all_products[$i]['price'] = $product->price;
                }
                else{
                    $all_products[$i]['new_price'] = $product->price;
                    $all_products[$i]['price'] = null;
                }
                $all_products[$i]['flash_sale'] = false;
                $i++;
            }
    
            $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
            foreach($flash_sale_products as $flash_sale_product){
                $all_products[$i]['id'] = $flash_sale_product->uniq;
                $all_products[$i]['name'] = $flash_sale_product->products->name;
                $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                $all_products[$i]['price'] = $flash_sale_product->products->price;
                if($flash_sale_product->image == null){
                    $all_products[$i]['image'] = $flash_sale_product->products->image;
                }
                else{
                    $all_products[$i]['image'] = $flash_sale_product->image;
                }
                $all_products[$i]['flash_sale'] = true;
                $i++;
            }

            return Inertia::render('Code/Payment', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'real_vouchers' => $vouchers,
                'all_products' => $all_products,
                'csrf' => csrf_token()
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

                if($request->voucher == 'undefined'){
                    $voucherId = null;
                    $voucherDisc = null;
                }
                else{
                    $voucher = Voucher::find($request->voucher);
                    $voucherId = $voucher->id;
                    $voucherDisc = $voucher->discount;
                }

                $image = time().'.'.$request->image->extension();
                $path =  $request->image->move(public_path('/upload/checkout'),$image);
                $checkout = Checkout::create([
                    'users_id' => $user->id,
                    'merchants_id' => $referral->id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'total' => $request->price,
                    'type' => $voucherId,
                    'discount' => $voucherDisc,
                    'image' => '/upload/checkout/'.$path->getFileName(),
                    'status' => 1,
                ]);

                $i = 1;
                foreach($request->cartId as $cartId){
                    $carts[$i]['id'] = $cartId;
                    $i++;
                }
                $i = 1;
                foreach($request->cartQty as $cartQty){
                    $carts[$i]['qty'] = $cartQty;
                    $i++;
                }
                foreach($carts as $cart){
                    $product = Product::where('uniq', $cart['id'])->first();
                    if(!$product){
                        $flash_sale = FlashSale::where('uniq', $cart['id'])->first();
                        if($flash_sale->image){
                            $flash_sale_image = $flash_sale->image;
                        }
                        else{
                            $flash_sale_image = $flash_sale->products->image;
                        }
                        $cost = Cost::create([
                            'checkouts_id' => $checkout->id,
                            'product' => $flash_sale->products->name,
                            'amount' => $cart['qty'],
                            'price' => $flash_sale->new_price,
                            'image' => $flash_sale_image
                        ]);
                    }
                    else{
                        if($product->discount_price){
                            $cost = Cost::create([
                                'checkouts_id' => $checkout->id,
                                'product' => $product->name,
                                'amount' => $cart['qty'],
                                'price' => $product->discount_price,
                                'image' => $product->image
                            ]);
                        }
                        else{
                            $cost = Cost::create([
                                'checkouts_id' => $checkout->id,
                                'product' => $product->name,
                                'amount' => $cart['qty'],
                                'price' => $product->price,
                                'image' => $product->image
                            ]);
                        }
                    }
                }
                return redirect()->route('code.index', $code);
            }

            if($request->voucher == 'undefined'){
                $voucherId = null;
                $voucherDisc = null;
            }
            else{
                $voucher = Voucher::find($request->voucher);
                $voucherId = $voucher->id;
                $voucherDisc = $voucher->discount;
            }
    
            $image = time().'.'.$request->image->extension();
            $path =  $request->image->move(public_path('/upload/checkout'),$image);
            $checkout = Checkout::create([
                'merchants_id' => $referral->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $request->price,
                'type' => $voucherId,
                'discount' => $voucherDisc,
                'image' => '/upload/checkout/'.$path->getFileName(),
                'status' => 1,
            ]);
    
            $i = 1;
            foreach($request->cartId as $cartId){
                $carts[$i]['id'] = $cartId;
                $i++;
            }
            $i = 1;
            foreach($request->cartQty as $cartQty){
                $carts[$i]['qty'] = $cartQty;
                $i++;
            }
            foreach($carts as $cart){
                $product = Product::where('uniq', $cart['id'])->first();
                if(!$product){
                    $flash_sale = FlashSale::where('uniq', $cart['id'])->first();
                    if($flash_sale->image){
                        $flash_sale_image = $flash_sale->image;
                    }
                    else{
                        $flash_sale_image = $flash_sale->products->image;
                    }
                    $cost = Cost::create([
                        'checkouts_id' => $checkout->id,
                        'product' => $flash_sale->products->name,
                        'amount' => $cart['qty'],
                        'price' => $flash_sale->new_price,
                        'image' => $flash_sale_image
                    ]);
                }
                else{
                    if($product->discount_price){
                        $cost = Cost::create([
                            'checkouts_id' => $checkout->id,
                            'product' => $product->name,
                            'amount' => $cart['qty'],
                            'price' => $product->discount_price,
                            'image' => $product->image
                        ]);
                    }
                    else{
                        $cost = Cost::create([
                            'checkouts_id' => $checkout->id,
                            'product' => $product->name,
                            'amount' => $cart['qty'],
                            'price' => $product->price,
                            'image' => $product->image
                        ]);
                    }
                }
            }
            return redirect()->route('code.index', $code);
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
                    $checkouts = Checkout::where('users_id', $user->id)->first();
                    return Inertia::render('Code/Account', [
                        'code' => $code,
                        'check' => true,
                        'user' => $user,
                        'checkouts' => $checkouts
                    ]);
                }
                return view('/dashboard/index');
            }
                return redirect()->route('code.login', $code);
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
    
                    $products = Product::with('categories')->get();
                    $i=0;
                    foreach($products as $product){
                        $all_products[$i]['id'] = $product->uniq;
                        $all_products[$i]['name'] = $product->name;
                        $all_products[$i]['unit'] = $product->unit;
                        $all_products[$i]['category'] = $product->categories->name;
                        $all_products[$i]['stock'] = $product->stock;
                        $all_products[$i]['image'] = $product->image;
                        if($product->discount_price){
                            $all_products[$i]['new_price'] = $product->discount_price;
                            $all_products[$i]['price'] = $product->price;
                        }
                        else{
                            $all_products[$i]['new_price'] = $product->price;
                            $all_products[$i]['price'] = null;
                        }
                        $all_products[$i]['flash_sale'] = false;
                        $i++;
                    }
            
                    $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
                    foreach($flash_sale_products as $flash_sale_product){
                        $all_products[$i]['id'] = $flash_sale_product->uniq;
                        $all_products[$i]['name'] = $flash_sale_product->products->name;
                        $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                        $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                        $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                        $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                        $all_products[$i]['price'] = $flash_sale_product->products->price;
                        if($flash_sale_product->image == null){
                            $all_products[$i]['image'] = $flash_sale_product->products->image;
                        }
                        else{
                            $all_products[$i]['image'] = $flash_sale_product->image;
                        }
                        $all_products[$i]['flash_sale'] = true;
                        $i++;
                    }
            
                    return Inertia::render('Code/Flashsale', [
                        'code' => $code,
                        'check' => $check,
                        'user' => $user,
                        'all_products' => $all_products
                    ]);
                }
                else if(Auth()->user()->roles->name == 'Super Admin'){
                    return 'super admin';
                }
            }
            $user = new User;
    
            $products = Product::with('categories')->get();
            $i=0;
            foreach($products as $product){
                $all_products[$i]['id'] = $product->uniq;
                $all_products[$i]['name'] = $product->name;
                $all_products[$i]['unit'] = $product->unit;
                $all_products[$i]['category'] = $product->categories->name;
                $all_products[$i]['stock'] = $product->stock;
                $all_products[$i]['image'] = $product->image;
                if($product->discount_price){
                    $all_products[$i]['new_price'] = $product->discount_price;
                    $all_products[$i]['price'] = $product->price;
                }
                else{
                    $all_products[$i]['new_price'] = $product->price;
                    $all_products[$i]['price'] = null;
                }
                $all_products[$i]['flash_sale'] = false;
                $i++;
            }
    
            $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
            foreach($flash_sale_products as $flash_sale_product){
                $all_products[$i]['id'] = $flash_sale_product->uniq;
                $all_products[$i]['name'] = $flash_sale_product->products->name;
                $all_products[$i]['unit'] = $flash_sale_product->products->unit;
                $all_products[$i]['category'] = $flash_sale_product->products->categories->name;
                $all_products[$i]['stock'] = $flash_sale_product->products->stock;
                $all_products[$i]['new_price'] = $flash_sale_product->new_price;
                $all_products[$i]['price'] = $flash_sale_product->products->price;
                if($flash_sale_product->image == null){
                    $all_products[$i]['image'] = $flash_sale_product->products->image;
                }
                else{
                    $all_products[$i]['image'] = $flash_sale_product->image;
                }
                $all_products[$i]['flash_sale'] = true;
                $i++;
            }
    
            return Inertia::render('Code/Flashsale', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'all_products' => $all_products
            ]);
        }
        else{
            abort(404);
        }
    }

    public function banner($code, $slug)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            $check = Auth()->check();
            if($check){
                if(Auth()->user()->roles->name == 'User'){
                    $user = Auth()->user();
    
                    $advertisement = Advertisement::where('path', $slug)->with('products')->first();
                    if(!$advertisement->products->count()) $all_products = null;
                    $i=0;
                    foreach($advertisement->products as $product){
                        $all_products[$i]['id'] = $product->uniq;
                        $all_products[$i]['name'] = $product->name;
                        $all_products[$i]['unit'] = $product->unit;
                        $all_products[$i]['category'] = $product->categories->name;
                        $all_products[$i]['stock'] = $product->stock;
                        $all_products[$i]['image'] = $product->image;
                        if($product->discount_price){
                            $all_products[$i]['new_price'] = $product->discount_price;
                            $all_products[$i]['price'] = $product->price;
                        }
                        else{
                            $all_products[$i]['new_price'] = $product->price;
                            $all_products[$i]['price'] = null;
                        }
                        $all_products[$i]['flash_sale'] = false;
                        $i++;
                    }
            
                    return Inertia::render('Code/Banner', [
                        'code' => $code,
                        'check' => $check,
                        'user' => $user,
                        'advertisement' => $advertisement,
                        'tnc' => json_encode($advertisement->tnc),
                        'all_products' => $all_products
                    ]);
                }
                else if(Auth()->user()->roles->name == 'Super Admin'){
                    return 'super admin';
                }
            }
            $user = new User;
    
            $advertisement = Advertisement::where('path', $slug)->with('products')->first();
            if(!$advertisement->products->count()) $all_products = null;
            $i=0;
            foreach($advertisement->products as $product){
                $all_products[$i]['id'] = $product->uniq;
                $all_products[$i]['name'] = $product->name;
                $all_products[$i]['unit'] = $product->unit;
                $all_products[$i]['category'] = $product->categories->name;
                $all_products[$i]['stock'] = $product->stock;
                $all_products[$i]['image'] = $product->image;
                if($product->discount_price){
                    $all_products[$i]['new_price'] = $product->discount_price;
                    $all_products[$i]['price'] = $product->price;
                }
                else{
                    $all_products[$i]['new_price'] = $product->price;
                    $all_products[$i]['price'] = null;
                }
                $all_products[$i]['flash_sale'] = false;
                $i++;
            }
    
            return Inertia::render('Code/Banner', [
                'code' => $code,
                'check' => $check,
                'user' => null,
                'advertisement' => $advertisement,
                'tnc' => json_encode($advertisement->tnc),
                'all_products' => $all_products
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
                'user' => $user,
                'csrf' => csrf_token()
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
                return redirect()->route('code.home', $code);
            }
            return redirect()->back()->withInput($request->only('email', 'password', 'remember'))->withErrors([
                'password' => 'Password salah',
            ]);
        }
        else{
            abort(404);
        }
    }

    public function logout($code)
    {
        $referral = User::where('referral_code', $code)->first();
        if($referral){
            Auth::logout();
            return redirect()->route('code.home', $code);
        }
        else{
            abort(404);
        }
    }
}
