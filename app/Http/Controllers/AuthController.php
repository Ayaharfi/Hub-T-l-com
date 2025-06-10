<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès !');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les informations sont incorrectes.',
        ]);
    }

    public function showForgotPasswordForm() {
        return view('auth.forgot-password');
    }

    public function dashboard() {
        return view('dashboard');
    }
 // Affiche le profil de l'utilisateur connecté
    public function showProfile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
