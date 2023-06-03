<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Password;

class ForgorController extends Controller
{
    public function index(){
        return view('auth.forgotpass');
    }

    public function sendLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Reset link sent successfully!');
        }

        return back()->withErrors(['email' => trans($response)]);
    }
}
