<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flash;
use App\Models\FlashSale;
use App\Models\Product;

class FlashController extends Controller
{
    //
    public function get(){
        $flashes = FlashSale::get();
        $products = Product::get();
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/flash',['flashes' => $flashes,'products' => $products]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/flash',['flashes' => $flashes,'products' => $products]);
        }
    }

    public function create(Request $request){

        $image = time().'-'.'.'.$request->product_image->extension();
        $path =  $request->product_image->move(public_path('flashimage'),$image);

        $flash = Flash::create([
            'name' => $request->name,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        FlashSale::create([
            'flashes_id' => $flash->id,
            'product_id' => $request->product_id,
            'image' => $path,
            'new_price' => $request->price,
            'amount' => $request->amount,
        ]);

        return redirect('/flash');
    }

    public function delete($id){
        FlashSale::where('id','=',$id)->delete();
        return redirect('flash');
    }

    public function edit($id){
        $flashsale = FlashSale::findOrFail('id','=',$id);
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/edit/flash',['flashsale' => $flashsale]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/edit/flash',['flashsale' => $flashsale]);
        }
    }

    public function doEdit(Request $request){
        FlashSale::where('id','=',$request->id)->update([
            'flashes_id' => $flash->id,
            'product_id' => $request->product_id,
            'image' => $path,
            'new_price' => $request->price,
            'amount' => $request->amount,
        ]);

        return redirect('/flash');
    }
}
