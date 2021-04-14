<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\User;
use App\Models\Cost;
use App\Models\Voucher;
use DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard/transactions/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vouchers = Voucher::get();
        $users = User::get();
        $model = new Checkout();
        return view('dashboard/transactions/form',['model' => $model,'users' => $users,'vouchers'=>$vouchers]);
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
        $model = Checkout::create([
            'users_id' => $request->users_id,
            'vouchers_id'=> $request->vouchers_id,
            'total'=> $request->total,
            'status'=> $request->status,

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
        $model = Checkout::findOrFail($id);
        return view('dashboard/transactions/show',['model' => $model]);
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
        $model = Checkout::findOrFail($id);
        return view('dashboard/transactions/form',['model' => $model]);
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
        $model = Checkout::findOrFail($id)->update([
            'status'=> $request->status,
            'detail'=> $request->detail,
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
        $model = Checkout::findOrFail($id)->delete();

        return response()->json($model);

    }

    public function data(){
        $model = Checkout::with('users','vouchers', 'merchants')->where('status', 1)->orWhere('status', 3)->orWhere('status', 4)->get();
        // dd($model);
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('transaction.show', $model->id).'" class="btn btn-primary btn-sm modal-show show" name="Detail" data-toggle="modal" data-target="#modal">Detail</button>
                        <button type="button" href="'.route('transaction.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('transaction.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete">Delete</button>
                    </div>';
            })
            ->addColumn('merchant', function($model){
                if($model->merchants_id != null){
                    return $model->merchants->name;
                }
            })
            ->editColumn('total', function($model){
                return 'Rp '.number_format($model->total, 0, ',', '.');
            })
            ->addColumn('status', function($model){
                if($model->status == 1){
                    return 'Dipesan';
                }
                if($model->status == 2){
                    return 'Selesai';
                }
                if($model->status == 3){
                    return 'Refund';
                }
                if($model->status == 4){
                    return 'Tidak Selesai';
                }
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
