<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Mail;
use App\Helpers\Mails;

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
        $this->validate($request, [
            'user_id' => ['required'],
            'subject' => ['required'],
            'content' => ['required'],
        ]);

        $user = User::find($request->user_id);
        
        Mails::sendMailAttached($user->email,$request->subject,$request->content);

        Mail::create([
            'target' => 'Nama = '.$user->name.' Email '.$user->email,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

    }

}
