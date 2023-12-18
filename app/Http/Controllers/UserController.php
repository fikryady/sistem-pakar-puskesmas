<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
{
    $user = Auth::user();

    return view('user.edit', [
        'user' => $user,
        'title' => 'Profile'
    ]);
}

public function update(Request $request)
{
    $user = Auth::user();

    $rules = [
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'max:255'],
        'tgl_lahir' => 'required|date',
        'no_hp' => 'required',
        'alamat' => 'required',
        'pekerjaan' => 'required',
        'email' => 'required|email:dns',
        'password' => 'required|min:5|max:255',
    ];

    $validatedData = $request->validate($rules);

    $validatedData['password'] = Hash::make($validatedData['password']);

    $user->update($validatedData);

    return redirect()->route('index');
}
}
