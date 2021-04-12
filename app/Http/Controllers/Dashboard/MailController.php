<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mail;
use App\Helpers\Mails;

class MailController extends Controller
{
    //
    public function index()
    {
        //
        return view('dashboard/blastmails/index');
    }

    public function send(Request $request)
    {
        //
        $this->validate($request, [
            'subject' => ['required'],
        ]);
        $users = User::with('roles')->where('roles_id','=',4)->get();


        if($request->attachment == NULL){
            foreach($users as $user){
                Mails::sendMail($user->email,$request->subject,$request->content);
            }
        }
        foreach($users as $user){
            Mails::sendMailAttached($user->email,$request->subject,$request->content);
        }

        Mail::create([
            'target' => 'Semua User',
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        // return response()->json($model);
    }
}
