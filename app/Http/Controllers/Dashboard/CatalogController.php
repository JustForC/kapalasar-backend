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

    public function download($id)
    {
        $model = Catalog::findOrFail($id);
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
            if(auth()->user()->roles->name == "Super Admin" || auth()->user()->roles->name == "Admin"){
                return '<div class="btn-group" role="group">
                            <button type="button" href="'.route('catalog.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                            <button type="button" href="'.route('catalog.download', $model->id).'" class="btn btn-primary btn-sm download" name="Download '.$model->name.'">Download</button>
                        </div>';
            }
            elseif(auth()->user()->roles->name == "Merchant"){
                return '<div class="btn-group" role="group">
                            <button type="button" href="'.route('catalog.download', $model->id).'" class="btn btn-primary btn-sm download" name="Download '.$model->name.'">Download</button>
                        </div>';
            }
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
