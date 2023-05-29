<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        return view('profile.index',[
            'title' => 'Profile',
            'css_name' => ['navbar', 'profile']
        ]);
    }
    
    public function edit(){
        return view('profile.edit',[
            'title' => 'Profile Edit',
            'css_name' => ['navbar', 'form']
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required',
            'phone' => 'required|min:11|numeric'
        ];

        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if($request->file('profile_image')){
            $rules['profile_image'] = 'required|image|file|max:102400';
        }

        $validated = $request->validate($rules);
        $validated['password'] = $user->password;

        if($request->file('profile_image')){
            if($user->profile_image){
                Storage::delete($user->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('profile-images');
        }

        User::where('id', $user->id)->update($validated);

        return redirect('/profile')->with('success', 'Berhasil Mengupdate Profile!');
    }
}
