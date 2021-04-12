<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Checkout;
use App\Models\Cost;
use App\Models\FlashSale;
use App\Models\Advertisement;

use Notification;
use App\Notifications\PWANotification;

class HomeController extends Controller
{
    public function index()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                $products = Product::with('categories')->get();
                $banners = Advertisement::get()->reject(function($query){
                    if($query->id == 1) return true;
                });
                $popUp = Advertisement::find(1);
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
                    'real_products' => $products,
                    'banners' => $banners,
                    'popUp' => $popUp
                ]);
            }
            elseif(Auth()->user()->roles->name == 'Merchant'){
                $user = Auth()->user();
                $index = 0;
                $transactions = Checkout::where('merchants_id','=',Auth()->user()->id)->get();
                $checkouts = Checkout::where('merchants_id','=',Auth()->user()->id)->get();
                $januari = 0;
                $februari = 0;
                $maret = 0;
                $april = 0;
                $mei = 0;
                $juni = 0;
                $juli = 0;
                $agustus = 0;
                $september = 0;
                $oktober = 0;
                $november = 0;
                $desember = 0;
                foreach($checkouts as $check){
                    if($check->created_at->format('M') == 'Jan'){
                        $januari = $januari + 1;
                    }
                    elseif($check->created_at->format('M') == 'Feb'){
                        $februari = $februari + 1;
                    }
                    elseif($check->created_at->format('M') == 'Mar'){
                        $maret = $maret + 1;
                    }
                    elseif($check->created_at->format('M') == 'Apr'){
                        $april = $april + 1;
                    }
                    elseif($check->created_at->format('M') == 'May'){
                        $mei = $mei + 1;
                    }
                    elseif($check->created_at->format('M') == 'Jun'){
                        $juni = $juni + 1;
                    }
                    elseif($check->created_at->format('M') == 'Jul'){
                        $juli = $juli + 1;
                    }
                    elseif($check->created_at->format('M') == 'Aug'){
                        $aug = $aug + 1;
                    }
                    elseif($check->created_at->format('M') == 'Sep'){
                        $september = $september + 1;
                    }
                    elseif($check->created_at->format('M') == 'Oct'){
                        $oktober = $oktober + 1;
                    }
                    elseif($check->created_at->format('M') == 'Nov'){
                        $november = $november + 1;
                    }
                    elseif($check->created_at->format('M') == 'Dec'){
                        $desember = $desember + 1;
                    }
            }
                return view('/merchant/dashboard/index',['transactions' => $transactions,
                    'januari' => $januari,
                    'februari' => $februari,
                    'maret' => $maret,
                    'april' => $april,
                    'mei' => $mei,
                    'juni' => $juni,
                    'juli' => $juli,
                    'agustus' => $agustus,
                    'september' => $september,
                    'oktober' => $oktober,
                    'november' => $november,
                    'desember' => $desember,
                ]);
            }
            $index = 1;
            $transactions = Checkout::latest()->take(5)->get();
            $checkouts = Checkout::get();
            $januari = 0;
            $februari = 0;
            $maret = 0;
            $april = 0;
            $mei = 0;
            $juni = 0;
            $juli = 0;
            $agustus = 0;
            $september = 0;
            $oktober = 0;
            $november = 0;
            $desember = 0;
            foreach($checkouts as $check){
                if($check->created_at->format('M') == 'Jan'){
                    $januari = $januari + 1;
                }
                elseif($check->created_at->format('M') == 'Feb'){
                    $februari = $februari + 1;
                }
                elseif($check->created_at->format('M') == 'Mar'){
                    $maret = $maret + 1;
                }
                elseif($check->created_at->format('M') == 'Apr'){
                    $april = $april + 1;
                }
                elseif($check->created_at->format('M') == 'May'){
                    $mei = $mei + 1;
                }
                elseif($check->created_at->format('M') == 'Jun'){
                    $juni = $juni + 1;
                }
                elseif($check->created_at->format('M') == 'Jul'){
                    $juli = $juli + 1;
                }
                elseif($check->created_at->format('M') == 'Aug'){
                    $aug = $aug + 1;
                }
                elseif($check->created_at->format('M') == 'Sep'){
                    $september = $september + 1;
                }
                elseif($check->created_at->format('M') == 'Oct'){
                    $oktober = $oktober + 1;
                }
                elseif($check->created_at->format('M') == 'Nov'){
                    $november = $november + 1;
                }
                elseif($check->created_at->format('M') == 'Dec'){
                    $desember = $desember + 1;
                }
            }
            return view('/dashboard/index',['transactions' => $transactions,
            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,
            ]);
        }
        $user = new User;
        $banners = Advertisement::get()->reject(function($query){
            if($query->id == 1) return true;
        });
        $popUp = Advertisement::find(1);
        $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
        $i = 0;
        foreach($flash_sale_products as $flash_sale_product){
            $flash_sale_products[$i]['price'] = $flash_sale_product->products->price;
            $flash_sale_products[$i]['name'] = $flash_sale_product->products->name;
            $flash_sale_products[$i]['stock'] = $flash_sale_product->products->stock;
            if($flash_sale_product->image == null){
                $flash_sale_products[$i]['image'] = $flash_sale_product->products->image;
            }
            $i++;
        }
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
            'real_products' => $products,
            'banners' => $banners,
            'popUp' => $popUp,
            'flash_sales' => $flash_sale_products
        ]);
    }

    public function checkout()
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
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
                $checkouts = Checkout::with('costs')->where('users_id', $user->id)->get();
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
                $flash_sale_prod = FlashSale::with('products')->get();
                return Inertia::render('View/Flashsale', [
                    'check' => $check,
                    'user' => $user,
                    'real_products' => $flash_sale_prod
                ]);
            }
            else if(Auth()->user()->roles->name == 'Super Admin'){
                return 'super admin';
            }
        }
        $user = new User;
        // $flash_sale_prod = Product::with('categories')->get();
        // $flash_sale_prod = FlashSale::with('products')->get();
        $flash_sale_products = FlashSale::orderBy('id', 'desc')->take(12)->get();
        $i = 0;
        foreach($flash_sale_products as $flash_sale_product){
            $flash_sale_products[$i]['price'] = $flash_sale_product->products->price;
            $flash_sale_products[$i]['name'] = $flash_sale_product->products->name;
            $flash_sale_products[$i]['stock'] = $flash_sale_product->products->stock;
            if($flash_sale_product->image == null){
                $flash_sale_products[$i]['image'] = $flash_sale_product->products->image;
            }
            $i++;
        }


        return Inertia::render('View/Flashsale', [
            'check' => $check,
            'user' => null,
            'real_products' => $flash_sale_products
        ]);
    }

    public function banner($slug)
    {
        $check = Auth()->check();
        if($check){
            if(Auth()->user()->roles->name == 'User'){
                $user = Auth()->user();
                $flash_sale_prod = FlashSale::with('products')->get();
                foreach($flash_sale_prod as $product){
                    if($product->discount_price){
                        $product->new_price = $product->discount_price;
                        $product->price = $product->price;
                    }
                    else{
                        $product->new_price = $product->price;
                        $product->price = null;
                    }
                }
                return Inertia::render('View/Flashsale', [
                    'check' => $check,
                    'user' => $user,
                    'real_products' => $flash_sale_prod
                ]);
            }
            else if(Auth()->user()->roles->name == 'Super Admin'){
                return 'super admin';
            }
        }
        $user = new User;
        // $flash_sale_prod = Product::with('categories')->get();
        $flash_sale_prod = Advertisement::where('path', $slug)->with('products')->first();
        // dd($flash_sale_prod);
        return Inertia::render('View/Banner', [
            'check' => $check,
            'user' => null,
            'real_products' => $flash_sale_prod->products
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
