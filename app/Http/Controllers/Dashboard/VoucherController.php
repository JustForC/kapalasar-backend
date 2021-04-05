<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\Type;
use Auth;

class VoucherController extends Controller
{
    //
    public function get(){
        $vouchers = Voucher::get();
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/voucher',['vouchers' => $vouchers]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/voucher',['vouchers' => $vouchers]);
        }
    }

    public function create(Request $request){
        Voucher::create([
            'types_id' => $request->types_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'value' => $request->value,
            'percent' => $request->percent,
            'charge' => $request->charge,
            'start' => $request->start,
            'end' => $request->end,
        ]);
    }

    public function delete($id){
        Voucher::where('id','=',$id)->delete();
        return redirect('/voucher');
    }

    public function edit($id){
        $voucher = Voucher::findOrFail('id','=',$id);

        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/edit/voucher',['voucher' => $voucher]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/edit/voucher',['voucher' => $voucher]);
        }
    }

    public function doEdit(Request $request){
        Voucher::where('id','=',$request->id)->update([
            'types_id' => $request->types_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'value' => $request->value,
            'percent' => $request->percent,
            'charge' => $request->charge,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect('/voucher');
    }
}
