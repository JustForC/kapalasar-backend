<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserMailController extends Controller
{
    //
    public function index()
    {
        //
        $users = User::with('roles')->where('roles_id','=',4)->get();
        return view('dashboard/usermails/index',['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        //
        // $model = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'roles_id' => 4,
        // ]);

        // return response()->json($model);
        $image = time().'-'.'.'.$request->image->extension();
        $path =  $request->image->move(public_path('Upload/Ads'),$image);
        $user = User::find($request->user_id);
        var_dump($path->getRealPath());
    }

}
