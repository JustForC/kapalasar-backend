<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class MerchantController extends Controller
{
    //
    public function getMerchant(){
        $merchants = User::with('roles')->findWhere(['name','=','Merchant'])->get();
        return view('superadmin/merchant',['merchants' => $merchants]);
    }

    public function makeMerchant(Request $request){
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
            'refferal_code' => $request->refferal_code,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'phone' => $request->phone,
            'job' => $request->job,
            'roles_id' => 3,
        ]);

        return redirect('/merchant');
    }

    public function editForm($id){
        $merchant = User::findOrFail('id','=',$id);

        return view('superadmin/edit/merchant',['merchant' => $merchant]);
    }

    public function doEdit(Reqeust $request){
        User::where('id','=',$request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
            'refferal_code' => $request->refferal_code,
            'email' => $request->email,
            'age' => $request->age,
            'phone' => $request->phone,
            'job' => $request->job,
        ]);
    }
}
