<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    //
    public function get(){
        $users = User::with('roles')->findWhere(['name','=','User'])->get();
        return view('superadmin/user',['users' => $users]);
    }

    public function create(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'roles_id' => 4,
        ]);
        
        return redirect('/admin');
    }

    public function delete($id){
        User::where('id','=',$id)->delete();
        return redirect('/user');
    }

    public function edit($id){
        $user = User::findOrFail('id','=',$id);

        return view('superadmin/edit/user',['user' => $user]);
    }

    public function doEdit(Request $request){
        User::where('id','=',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'roles_id' => 4,
        ]);

        return redirect('/user');
    }
}
