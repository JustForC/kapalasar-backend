<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        return view('dashboard/advertisements/form',['model' => $model, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'path' => ['required'],
            'image' => ['required'],
        ]);

        $image = time().'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/ads'),$image);

        $model = Advertisement::create([
            'name' => $request->name,
            'path' => $request->path,
            'image' => '/upload/ads/'.$path->getFileName(),
        ]);

        return response()->json($model);
    }

    public function edit($id)
    {
        $model = Advertisement::findOrFail($id);
        return view('dashboard/advertisements/form',['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'path' => ['required'],
            'image' => ['required'],
        ]);

        $image = time().'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/ads'),$image);

        $model = Advertisement::findOrFail($id)->update([
            'name' => $request->name,
            'path' => $request->path,
            'image' => '/upload/ads/'.$path->getFileName(),
        ]);

        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = Advertisement::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = Advertisement::get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('ads.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('ads.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
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
