<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Auth;

class AdminController extends Controller
{
    //
    public function getAdmin(){
        $admins = User::where('role_id','=',1)->get();
        return view('superAdmin/admin',['admins' => $admins]);
    }
    
    public function makeAdmin(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
            'telephone' => ['required'],
            'address' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'job' => "Admin",
            'role_id' => 1,
        ]);

        return redirect('/superadmin/admin');
   }

    public function deleteAdmin($id){
        User::where('id','=',$id)->delete();
        
        return redirect('/superadmin/admin');
    }

    public function editAdmin(){

    }
}
