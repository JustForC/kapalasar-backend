<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{
    //
    public function get(){
        $products = Product::get();
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/product',['products' => $products]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/product',['products' => $products]);
        }
    }

    public function create(Request $request){
        $image = time().'-'.'.'.$request->product_image->extension();
        $path =  $request->product_image->move(public_path('productimages'),$image);

        if($request->discount_price == NULL){
            Product::create([
                'name' => $request->product_name,
                'unit' => $request->product_unit,
                'stock' => $request->product_stock,
                'price' => $request->product_price,
                'image' => $path,
                'categories_id' => $request->categories_id,
            ]);

            return redirect('/product');
        }

        Product::create([
            'name' => $request->product_name,
            'unit' => $request->product_unit,
            'stock' => $request->product_stock,
            'price' => $request->product_price,
            'discount_price' => $request->discount_price,
            'image' => $path,
            'categories_id' => $request->categories_id,
        ]);
        
        return redirect('/product');
    }

    public function delete($id){
        Product::where('id','=',$id)->delete();

        return redirect('/product');
    }

    public function edit($id){
        $product = Product::findOrFail('id','=',$id);
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/edit/product',['product' => $product]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/edit/product',['product' => $product]);
        }
    }

    public function doEdit(Request $request){
        if($request->discount_price == NULL){
            Product::where('id','=',$request->poduct_id)
                    ->update([
                        'name' => $request->product_name,
                        'unit' => $request->product_unit,
                        'stock' => $request->product_stock,
                        'price' => $request->product_price,
                        'discount_price' => $request->discount_price,
                        'image' => $path,
                        'categories_id' => $request->categories_id,
                    ]);
    
            return redirect('/product');
        }
        
        Product::where('id','=',$request->poduct_id)
                ->update([
                    'name' => $request->product_name,
                    'unit' => $request->product_unit,
                    'stock' => $request->product_stock,
                    'price' => $request->product_price,
                    'discount_price' => $request->discount_price,
                    'image' => $path,
                    'categories_id' => $request->categories_id,
                ]);

        return redirect('/product');
    }
}
