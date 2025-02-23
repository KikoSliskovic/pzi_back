<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use llluminate\Auth\Access;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        return response()->json(['message' => 'Login successful']);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        Auth::login($user);

        // Generate token or session here
        return response()->json(['message' => 'Login successful']);
    }

    public function getUser()
    {
        return response()->json(['user' => Auth::user()]);
    }
}