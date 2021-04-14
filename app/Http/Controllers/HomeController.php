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
use Carbon\Carbon;

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
                $banners = Advertisement::get()->reject(function($query){
                    if($query->id == 1) return true;
                });
                $popUp = Advertisement::find(1);

                $products = Product::with('categories')->get()->shuffle();
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
        

                return Inertia::render('View/Homepage', [
                    'check' => true,
                    'user' => $user,
                    'banners' => $banners,
                    'popUp' => $popUp,
                    'all_products' => $all_products
                ]);
            }
            elseif(Auth()->user()->roles->name == 'Merchant'){
                $user = Auth()->user();
                $index = 0;
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
                        $agustus = $agustus + 1;
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
                return view('/merchant/dashboard/index',[
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
                    $agustus = $agustus + 1;
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

        $products = Product::with('categories')->get()->shuffle();
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

        return Inertia::render('View/Homepage', [
            'check' => $check,
            'user' => null,
            'banners' => $banners,
            'popUp' => $popUp,
            'all_products' => $all_products
        ]);
    }

    public function checkout()
    {
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
        
                return Inertia::render('View/Checkout', [
                    'check' => true,
                    'user' => $user,
                    'real_vouchers' => $vouchers,
                    'all_products' => $all_products
                ]);
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

        return Inertia::render('View/Checkout', [
            'check' => $check,
            'user' => null,
            'real_vouchers' => $vouchers,
            'all_products' => $all_products,
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
        
                return Inertia::render('View/Payment', [
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

        return Inertia::render('View/Payment', [
            'check' => $check,
            'user' => null,
            'real_vouchers' => $vouchers,
            'all_products' => $all_products
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
                if(!$product){
                    $flash_sale = FlashSale::where('uniq', $cart['id'])->first();
                    $cost = Cost::create([
                        'checkouts_id' => $checkout->id,
                        'product' => $flash_sale->products->name,
                        'amount' => $cart['qty'],
                        'price' => $flash_sale->new_price
                    ]);
                }
                else{
                    if($product->discount_price->count()){
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
            $product = Product::where('uniq', $cart['id'])->first();
            if(!$product){
                $flash_sale = FlashSale::where('uniq', $cart['id'])->first();
                $cost = Cost::create([
                    'checkouts_id' => $checkout->id,
                    'product' => $flash_sale->products->name,
                    'amount' => $cart['qty'],
                    'price' => $flash_sale->new_price
                ]);
            }
            else{
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
        
                return Inertia::render('View/Flashsale', [
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

        return Inertia::render('View/Flashsale', [
            'check' => $check,
            'user' => null,
            'all_products' => $all_products
        ]);
    }

    public function banner($slug)
    {
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
        
                return Inertia::render('View/Flashsale', [
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

        return Inertia::render('View/Banner', [
            'check' => $check,
            'user' => null,
            'advertisement' => $advertisement,
            'tnc' => json_encode($advertisement->tnc),
            'all_products' => $all_products
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

    public function cekDateTime(){
        $date = Carbon::now()->timezone('Asia/Phnom_Penh');
        $voucher = Voucher::find(6);
        $start = new Carbon($voucher->start);
        $end = new Carbon($voucher->end);

        if(Carbon::now()->timezone('Asia/Phnom_Penh') < $end && Carbon::now()->timezone('Asia/Phnom_Penh') > $start){
            return "Dalam Timeline";
        }

        return "Tidak dalam timeline";
    }

}
