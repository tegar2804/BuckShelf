<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function regis(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'phone' => 'required|min:11|numeric',
            'password' => 'required|min:8|max:255',
            'repassword' => 'required_with:password|same:password|min:8|max:255'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return redirect('/login')->with('success', 'Registrasi Berhasil!');
    }
}
