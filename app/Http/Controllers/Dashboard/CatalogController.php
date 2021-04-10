<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use DataTables;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::get();
        return view('dashboard/catalogs/index',['catalogs' => $catalogs]);
    }

    public function create()
    {
        $model = new Catalog();
        return view('dashboard/catalogs/form',['model' => $model]);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required'],
            'image' => ['required'],
        ]);

        $image = time().'-'.'.'.$request->image->extension();
        $path =  $request->image->move(public_path('upload/Catalog'),$image);

        $model = Catalog::create([
            'name' => $request->name,
            'path' => '/upload/catalog/'.$path->getFileName(),
        ]);

        return response()->json($model);
    }

    public function download(Request $request)
    {
        $model = Catalog::findOrFail($request->id);
        $filePath = public_path($model->path);
        $headers = ['Content-Type: application/pdf'];
        $fileName = time().'.pdf';
        return response()->download($filePath,$fileName,$headers);
    }

    public function destroy($id)
    {
        $model = Catalog::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = Catalog::get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('catalog.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
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
