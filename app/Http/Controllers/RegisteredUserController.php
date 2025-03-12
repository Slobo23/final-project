<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(6)],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required'],
        ]);

        $user = User::create([
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
            'phone' => $userAttributes['phone'],
            'password' => Hash::make($userAttributes['password']),
            'password_confirmation' => Hash::make($userAttributes['password_confirmation']),
        ]);

        Auth::login($user);

        return redirect()->route('welcome');
    }
}
