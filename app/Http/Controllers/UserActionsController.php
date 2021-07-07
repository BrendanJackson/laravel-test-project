<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserActionsController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('profile.user-actions', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
