<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Checkout;
use DataTables;

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

        // return response()->json($model);
    }
}
