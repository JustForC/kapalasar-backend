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
    public function get(){
        $admins = User::with('roles')->findWhere(['name','=','Admin'])->get();
        return view('superadmin/admin',['admins' => $admins]);
    }

    public function create(Request $request){
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

    public function delete($id){
        User::where('id','=',$id)->delete();
        return redirect('/admin');
    }

    public function edit($id){
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
