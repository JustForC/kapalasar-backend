<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\User;
use App\Models\Cost;
use App\Models\Voucher;
use DataTables;

class DataMerchantController extends Controller
{
    public function data(){
        $model = Checkout::with('users','vouchers', 'merchants')->where('merchants_id','=',Auth()->user()->id)->get();;
        // dd($model);
        return DataTables::of($model)
            ->addColumn('merchant', function($model){
                if($model->merchants_id != null){
                    return $model->merchants->name;
                }
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
