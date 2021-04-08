<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
        $image = time().'-'.'.'.$request->product_image->extension();
        $path =  $request->product_image->move(public_path('Upload/Product'),$image);

        $model = Product::create([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => $path->getOrignalPath(),
        ]);

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
        $path =  $request->product_image->move(public_path('Upload/Product'),$image);

        $model = Product::findOrFail($id)->update([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => $path->getOriginalPath(),
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
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('product.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('product.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
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
