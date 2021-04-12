<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Advertisement;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    public function index()
    {
        return view('dashboard/banners/index');
    }

    public function create()
    {
        $model = new Banner;
        $products = Product::get();
        return view('dashboard/banners/form',['model' => $model, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => ['required'],
            'name' => ['required'],
            'image' => ['required'],
            'products' => ['required'],
            'status' => ['required'],
            'tnc' => ['required'],
        ]);

        $image = time().'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/banner'),$image);

        $advertisement = Advertisement::create([
            'name' => $request->name,
            'tnc' => $request->tnc,
            'status' => $request->status,
            'path' => Str::slug($request->name, '-'),
            'image' => '/upload/banner/'.$path->getFileName(),
        ]);
        $advertisement->products()->attach($request->products);
        return response()->json(true);
    }

    public function edit($id)
    {
        $model = Advertisement::findOrFail($id);
        $products = Product::get();
        $model['selected'] = $model->products()->allRelatedIds()->toArray();
        return view('dashboard/banners/form',['model' => $model, 'products' => $products]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'products' => ['required']
        ]);

        if($request->image == NULL){
            $advertisement = Advertisement::findOrFail($id);
            $advertisement->products()->sync($request->products);
            $advertisement->update([
                'tnc' => $request->tnc,
                'status' => $request->status,
                'name' => $request->name,
                'path' => Str::slug($request->name, '-')
            ]);
            return response()->json(true);
        }

        $image = time().'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/banner'),$image);

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->products()->sync($request->products);
        $advertisement->update([
            'name' => $request->name,
            'path' => Str::slug($request->name, '-'),
            'image' => '/upload/banner/'.$path->getFileName(),
        ]);
        // $banner = Banner::where('')

        return response()->json(true);
    }

    public function destroy($id)
    {
        $model = Advertisement::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = Advertisement::get();
        return DataTables::of($model)
            ->addColumn('product', function($model){
                $i = 0;
                if($model->products()->exists()){
                    foreach($model->products as $product){
                        $return[$i] = $product->name;
                        $i++;
                    }
                    return $return;
                }
                return '';
            })
            ->addColumn('action', function($model){
                return '<div class="btn-group" role="group">
                            <button type="button" href="'.route('banner.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        </div>';
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
