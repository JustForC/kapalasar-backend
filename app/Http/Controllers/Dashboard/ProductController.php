<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\User;
use DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard/products/index');
    }

    public function create()
    {
        $categories = Category::get();
        $model = new Product();
        return view('dashboard/products/form',['model' => $model,'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'categories_id' => ['required'],
            'unit' => ['required'],
            'price' => ['required'],
            'product_image' => ['required'],
            ]);

        $product = Product::orderBy('id','desc')->first();
        $flash = FlashSale::orderBy('id','desc')->first();

        if($flash->uniq > $product->uniq){
            $data = $flash->uniq + 1;
            $image = time().'-'.'.'.$request->product_image->extension();
            $path =  $request->product_image->move(public_path('/upload/product'),$image);
    
            $model = Product::create([
                'name' => $request->name,
                'uniq' => $data,
                'categories_id' => $request->categories_id,
                'unit' => $request->unit,
                'stock' => 1000,
                'status' => $request->status,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'image' => '/upload/product/'.$path->getFileName(),
            ]);

            return response()->json($model);
        }

        $data = $product->uniq + 1;
            
        $image = time().'-'.'.'.$request->product_image->extension();
        $path =  $request->product_image->move(public_path('/upload/product'),$image);

        $model = Product::create([
            'name' => $request->name,
            'uniq' => $data,
            'categories_id' => $request->categories_id,
            'unit' => $request->unit,
            'stock' => 1000,
            'status' => $request->status,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => '/upload/product/'.$path->getFileName(),
        ]);
        var_dump($path);
        return response()->json($model);
    }

    public function edit($id)
    {
        $categories = Category::get();
        $model = Product::findOrFail($id);
        return view('dashboard/products/form',['model' => $model,'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'categories_id' => ['required'],
            'unit' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
        ]);

        if($request->product_image == NULL){
            $product = Product::findOrFail($id);

            $model = Product::findOrFail($id)->update([
                'name' => $request->name,
                'categories_id' => $request->categories_id,
                'unit' => $request->unit,
                'stock' => $request->stock,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'image' => $product->image,
            ]);
            return response()->json($model);
        }

        $image = time().'-'.'.'.$request->product_image->extension();
        $path =  $request->product_image->move(public_path('upload/product'),$image);

        $model = Product::findOrFail($id)->update([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => '/upload/product/'.$path->getFileName(),
        ]);

        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = Product::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = Product::with('categories')->get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
                if(auth()->user()->roles->name == 'Super Admin' || auth()->user()->roles->name == 'Admin'){
                    return '<div class="btn-group" role="group">
                                <button type="button" href="'.route('product.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                                <button type="button" href="'.route('product.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                            </div>';
                }
            })
            ->addColumn('merchant', function($model){
                if($model->merchants_id != null){
                    return $model->merchants->name;
                }
            })
            ->editColumn('discount_price', function($model){
                return 'Rp '.number_format($model->discount_price, 0, ',', '.');
            })
            ->editColumn('price', function($model){
                return 'Rp '.number_format($model->price, 0, ',', '.');
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
