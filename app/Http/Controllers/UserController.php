<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        // view profile
        return view('profile');
    }
    public function update(Request $request)
    {
        // validate & update user data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'about' => 'nullable|string',
        ]);

        // update profile
        $user = Auth::user();
        $user->update($data);

        // redir back with message
        return redirect()->route('profile')->with('message', 'Profile updated successfully.');
    }
}
