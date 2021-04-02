<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SkeletonController extends Controller
{
    public function myself(Request $request)
    {
        return Inertia::render('Skeleton/Myself', [
            'user' => $request->user(),
            'team' => $request->user()->currentTeam,
        ]);
    }

    public function test(){
        return Inertia::render('View/Register');
    }
}
