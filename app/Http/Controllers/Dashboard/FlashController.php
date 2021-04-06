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
    // public function get(){
    //     $flashes = FlashSale::get();
    //     $products = Product::get();
    //     if(Auth::user()->roles->name == "Super Admin"){
    //         return view('superadmin/flash',['flashes' => $flashes,'products' => $products]);
    //     }
    //     elseif(Auth::user()->roles->name == "Admin"){
    //         return view('admin/flash',['flashes' => $flashes,'products' => $products]);
    //     }
    // }

    // public function create(Request $request){

    //     $image = time().'-'.'.'.$request->product_image->extension();
    //     $path =  $request->product_image->move(public_path('flashimage'),$image);

    //     $flash = Flash::create([
    //         'name' => $request->name,
    //         'start' => $request->start,
    //         'end' => $request->end,
    //     ]);

    //     FlashSale::create([
    //         'flashes_id' => $flash->id,
    //         'product_id' => $request->product_id,
    //         'image' => $path,
    //         'new_price' => $request->price,
    //         'amount' => $request->amount,
    //     ]);

    //     return redirect('/flash');
    // }

    // public function delete($id){
    //     FlashSale::where('id','=',$id)->delete();
    //     return redirect('flash');
    // }

    // public function edit($id){
    //     $flashsale = FlashSale::findOrFail('id','=',$id);
    //     if(Auth::user()->roles->name == "Super Admin"){
    //         return view('superadmin/edit/flash',['flashsale' => $flashsale]);
    //     }
    //     elseif(Auth::user()->roles->name == "Admin"){
    //         return view('admin/edit/flash',['flashsale' => $flashsale]);
    //     }
    // }

    // public function doEdit(Request $request){
    //     FlashSale::where('id','=',$request->id)->update([
    //         'flashes_id' => $flash->id,
    //         'product_id' => $request->product_id,
    //         'image' => $path,
    //         'new_price' => $request->price,
    //         'amount' => $request->amount,
    //     ]);

    //     return redirect('/flash');
    // }
    // //sadfsdaf
    // public function index()
    // {
    //     //
    //     return view('dashboard/flashes/index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    //     $model = new Flash();
    //     return view('dashboard/flashes/form',['model' => $model]);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    //     $model = Flash::create([
    //         'name'=> $request->Flash_name,
    //     ]);

    //     return response()->json($model);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    //     $model = Flash::findOrFail($id);
    //     return view('dashboard/product/form',['model' => $model]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $model = Flash::findOrFail($id)->update([
    //         'name'=> $request->Flash_name,
    //     ]);

    //     return response()->json($model);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    //     $model = Flash::findOrFail($id)->delete();
    //     return response()->json($model);
    // }

    // public function data(){
    //     $model = Flash::get();
    //     return DataTables::of($model)
    //         ->addColumn('action', function($model){
    //         return '<div class="btn-group" role="group">
    //                     <button Flash="button" href="'.route('product.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
    //                     <button type="button" href="'.route('product.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
    //                 </div>';
    //         })
    //         ->addColumn('timeline', function($model){
    //             return date('d M Y', strtotime($model->date)).' '.date('H:i', strtotime($model->start)).' - '.date('H:i', strtotime($model->end));
    //         })
    //         ->addIndexColumn()
    //         ->removeColumn([])
    //         ->rawColumns([])
    //         ->make(true);
    // }
}
