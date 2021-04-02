<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Validator;

class VoucherController extends Controller
{
    //
    public function getVoucher(){
        $vouchers = Voucher::get();
        return view('superAdmin/voucher',['vouchers' => $vouchers]);
    }

    public function makeVoucher(Request $request){
        $validator = Validator::make($request->all(),[
            'voucher_name' => ['required'],
            'voucher_type'=> ['required'],
            'voucher_description'=> ['required'],
            'voucher_category'=> ['required'],
        ]);
        if($request->voucher_start == NULL && $request->voucher_amount == NULL){
            Voucher::create([
                'voucher_name' => $request->voucher_name,
                'voucher_type'=> $request->voucher_type,
                'voucher_description'=> $request->voucher_description,
                'voucher_category'=> $request->voucher_category,
            ]);

            return redirect('/superadmin/voucher');
        }
        elseif($request->voucher_start == NULL){
            Voucher::create([
                'voucher_name' => $request->voucher_name,
                'voucher_type'=> $request->voucher_type,
                'voucher_amount'=> $request->voucher_amount,
                'voucher_description'=> $request->voucher_description,
                'voucher_category'=> $request->voucher_category,
            ]); 

            return redirect('/superadmin/voucher');
        }
        elseif($request->voucher_amount == NULL){
            Voucher::create([
                'voucher_name' => $request->voucher_name,
                'voucher_type'=> $request->voucher_type,
                'voucher_description'=> $request->voucher_description,
                'voucher_category'=> $request->voucher_category,
                'voucher_start'=> $request->voucher_start,
                'voucher_end'=> $request->voucher_end,
            ]);

            return redirect('/superadmin/voucher');
        }
        Voucher::create([
            'voucher_name' => $request->voucher_name,
            'voucher_type'=> $request->voucher_type,
            'voucher_amount'=> $request->voucher_amount,
            'voucher_description'=> $request->voucher_description,
            'voucher_category'=> $request->voucher_category,
            'voucher_start'=> $request->voucher_start,
            'voucher_end'=> $request->voucher_end,
        ]);
        
        return redirect('/superadmin/voucher');
    }

    public function editVoucher(){

    }

    public function deleteVoucher($id){
        Voucher::where('id','=',$id)->delete();
        return redirect('/superadmin/voucher');
    }
    
}
