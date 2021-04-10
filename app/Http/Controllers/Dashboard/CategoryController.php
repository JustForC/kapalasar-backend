<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard/categories/index');
    }

    public function create()
    {
        $model = new Category();
        return view('dashboard/categories/form',['model' => $model]);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required'],
            'image' => ['required'],
        ]);

        $image = time().'-'.'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/category'),$image);

        $model = Category::create([
            'name' => $request->name,
            'image' => '/upload/category/'.$path->getFileName(),
        ]);

        return response()->json($model);
    }

    public function edit($id)
    {
        $model = Category::findOrFail($id);
        return view('dashboard/categories/form',['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        //

        if($request->image == NULL){
            $image = Category::findOrFail($id);

            $model = Category::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $image->image,
            ]);
            
            return response()->json($model);
        }
        
        $image = time().'-'.'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/category'),$image);

        $model = Category::findOrFail($id)->update([
            'name' => $request->name,
            'image' => '/upload/category/'.$path->getFileName(),
        ]);
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = Category::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = Category::get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('category.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('category.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
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