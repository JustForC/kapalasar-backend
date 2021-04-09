<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\Type;
use Auth;
use DataTables;

class VoucherController extends Controller
{
    //
    public function index()
    {
        //
        return view('dashboard/vouchers/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::get();
        $model = new Voucher();
        return view('dashboard/vouchers/form',['model' => $model,'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'types_id' => ['required'],
            'name' => ['required'],
        ]);

        $model = Voucher::create([
            'types_id' => $request->types_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'value' => $request->value,
            'percent' => $request->percent,
            'start' => $request->start,
            'end' => $request->end,
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
        $types = Type::get();
        $model = Voucher::findOrFail($id);
        return view('dashboard/vouchers/form',['model' => $model,'types' => $types]);
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
        //
        $model = Voucher::findOrFail($id)->update([
            'types_id' => $request->types_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'value' => $request->value,
            'percent' => $request->percent,
            'start' => $request->start,
            'end' => $request->end,
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
        $model = Voucher::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data(){
        $model = Voucher::with('types')->get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('voucher.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('voucher.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
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
