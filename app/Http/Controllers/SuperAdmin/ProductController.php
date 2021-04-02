<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function getProduct(){
        $products = Product::get();
        return view('superAdmin/Product',['products' => $products]);
    }
    
    public function makeProduct(Request $request){
        $image = time().'-'.'.'.$request->product_image->extension();
        $test =  $request->product_image->move(public_path('productimages'),$image);

        if($request->product_cutprice != NULL){
            $price = $request->product_price - $request->product_cutprice;
            var_dump($request->all());
            Product::create([
                'product_image' => $image,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_stock' => $request->product_stock,
                'product_price' => $request->product_price,
                'product_cutprice' => $request->product_cutprice,
                'product_category' => $request->product_category,
                'product_finalprice' => $price,
            ]);
            return redirect('superadmin/product');
        }
        Product::create([
            'product_image' => $image,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_stock' => $request->product_stock,
            'product_price' => $request->product_price,
            'product_category' => $request->product_category,
            'product_finalprice' => $request->product_price,
        ]);
        return redirect('superadmin/product');
    }

    public function editProduct($id){

    }

    public function deleteProduct($id){
        Product::where('id','=',$id)->delete();
        return redirect('superadmin/product');
    }
}
