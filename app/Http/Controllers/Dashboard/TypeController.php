<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function getType(){
        $types = Type::get();
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/type',['types' => $types]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/type',['types' => $types]);
        }
    }

    public function makeType(Request $request){
        Type::create([
            'name',
        ]);

        return redirect('/type');
    }

    public function editForm($id){
        $type = Type::findOrFail('id','=',$id);
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/edit/type',['type' => $type]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/edit/type',['type' => $type]);
        }
    }

    public function doEdit(Request $request){
        Type::where('id','=',$request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('/type');
    }
}
