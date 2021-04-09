<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Mail;

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
        Mail::create([
            'target' => 'Semua User',
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        // return response()->json($model);
    }
}
