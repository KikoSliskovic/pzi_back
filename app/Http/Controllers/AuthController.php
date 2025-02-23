<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        Auth::login($user); // Prijava korisnika u session

        return response()->json([
            'message' => 'Login successful',
            'user' => $user
        ]);
    }

    public function getUser()
    {
        return response()->json(['user' => Auth::user()->load('roles')]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return response()->json(['message'=>"Uspjesna odjava."]);
    }

}
