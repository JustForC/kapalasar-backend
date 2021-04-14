<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
// use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        $check = Auth()->check();
        if($check){
            return redirect()->route('home');
        }
        $user = new User;
        return Inertia::render('View/Signup', [
            'check' => $check,
            'user' => $user,
            'csrf' => csrf_token()
        ]);
    }

    public function register(Request $request)
    {
        //Error messages
        $messages = [
            'name.required' => 'Nama tidak boleh kosong',
            'phone.required' => 'Nomor Telepon tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus benar',
            'email.unique' => "Email ini sudah ada yang pakai",
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.required' => 'Password tidak boleh kosong',
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'name' => ['required'],
            'phone' => ['required']
        ], $messages);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'roles_id' => 4
            ]);
            Auth::login($user);
            return redirect('/');
        }
    }
}
