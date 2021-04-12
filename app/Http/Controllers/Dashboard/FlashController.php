<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flash;
use App\Models\FlashSale;
use App\Models\Product;
use DataTables;

class FlashController extends Controller
{
    //
    public function index()
    {
        //
        return view('dashboard/flashes/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::get();
        $model = new FlashSale();
        return view('dashboard/flashes/form',['model' => $model,'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'name' => ['required'],
            // 'start' => ['required'],
            // 'end' => ['required'],
            'products_id' => ['required'],
            'new_price' => ['required'],
        ]);

        $p = Product::orderBy('id','desc')->first();
        $f = FlashSale::orderBy('id','desc')->first();
        //Kalo gak masukin gambar
        if($request->image == NULL){
            $product = Product::find($request->products_id);


            if($f->uniq > $p->uniq){
                $data = $f->uniq + 1;

                $model = FlashSale::create([
                    'uniq' => $data,
                    'flashes_id' => 1,
                    'products_id' => $request->products_id,
                    'image' => $product->image,
                    'new_price' => $request->new_price,
                ]);
            }
            $data = $p + 1;

            $model = FlashSale::create([
                'uniq' => $data,
                'flashes_id' => 1,
                'products_id' => $request->products_id,
                'image' => $product->image,
                'new_price' => $request->new_price,
            ]);

            return response()->json($model);
        }

        //Kalo masukin gambar
        $image = time().'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/flash'),$image);
        // $flash = Flash::create([
        //     'name' => $request->name,
        //     'start' => $request->start,
        //     'end' => $request->end,
        // ]);

        if($f->uniq > $p->uniq){
            $data = $f + 1;

            $model = FlashSale::create([
                'flashes_id' => 1,
                'products_id' => $request->products_id,
                'image' => '/upload/flash/'.$path->getFileName(),
                'new_price' => $request->new_price,
            ]);

            return response()->json($model);
        }

        $data = $p + 1;
        
        $model = FlashSale::create([
            'flashes_id' => 1,
            'products_id' => $request->products_id,
            'image' => '/upload/flash/'.$path->getFileName(),
            'new_price' => $request->new_price,
        ]);

        return response()->json($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products = Product::get();
        $model = FlashSale::findOrFail($id);
        return view('dashboard/flashes/form',['model' => $model,'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->image == NULL){
            $flash = Flash::findOrFail($id);

            $model = Flash::findOrFail($id)->update([
                'product_id' => $request->product_id,
                'image' => $flash->image,
                'new_price' => $request->price,
            ]);

            return response()->json($model);
        }

        $image = time().'-'.'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/flash'),$image);

        $model = FlashSale::findOrFail($id)->update([
            'products_id' => $request->products_id,
            'image' => '/upload/flash/'.$path->getFileName(),
            'new_price' => $request->new_price,
        ]);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = FlashSale::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = FlashSale::with('products','flashes')->get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button Flash="button" href="'.route('flash.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('flash.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                    </div>';
            })
            ->addColumn('timeline', function($model){
                return date('d M Y', strtotime($model->date)).' '.date('H:i', strtotime($model->start)).' - '.date('H:i', strtotime($model->end));
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
