<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    //
    public function getAdmin(){
        $admins = User::with('roles')->findWhere(['name','=','Admin'])->get();
        return view('superadmin/admin',['admins' => $admins]);
    }

    public function createAdmin(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'job' => "Admin",
            'roles_id' => 2,
        ]);
        
        return redirect('/admin');
    }

    public function editForm($id){
        $admin = User::findOrFail('id','=',$id);

        return view('superadmin/edit/admin',['admin' => $admin]);
    }

    public function doEdit(Request $request){
        User::where('id','=',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'job' => "Admin",
            'roles_id' => 2,
        ]);

        return redirect('/admin');
    }
}
