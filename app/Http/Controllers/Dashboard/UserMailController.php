<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Mail;

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
        $user = User::find($request->user_id);
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = \config('newmailer.host');             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = \config('newmailer.username');   //  sender username
            $mail->Password = \config('newmailer.password');       // sender password
            $mail->SMTPSecure = \config('newmailer.encryption');                  // encryption - ssl/tls
            $mail->Port = \config('newmailer.port');                          // port - 587/465
            $mail->addAddress($user->email);
            $mail->Subject = $request->subject;
            $mail->Body    = $request->content;
            $mail->isHTML(true);

        Mail::create([
            'target' => 'Nama = '.$user->name.' Email '.$user->email,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

    }

}
