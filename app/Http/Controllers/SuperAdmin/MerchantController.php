<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\models\Merchant;
use Validator;
use Hash;

class MerchantController extends Controller
{
    //
    public function getMerchant(){
        $merchants = User::where('role_id','=',2)->get();
        return view('superAdmin/merchant',['merchants' => $merchants]);
    }
    
    public function registerMerchant(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'pasword' => ['required'],
            'email' => ['required'],
            'job' => ['required'],
            'age' => ['required'],
            'merchant_code' => ['required'],
            'address' => ['required'],
            'address_detail' => ['required'],
            'telephone' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
            'job' => $request->job,
            'age' => $request->age,
            'telephone' => $request->telephone,
            'role_id' => 2,
        ]);

        Merchant::create([
            'merchant_email' => $request->email,
            'merchant_code' => $request->merchant_code
        ]);

        return redirect('/superadmin/merchant');

    }

    public function deleteMerchant($id){
        User::where('id','=',$id)->delete();
        return redirect('/superadmin/merchant');
    }

    public function editMerchant(){

    }
}
