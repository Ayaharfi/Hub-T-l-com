<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // Récupérer toutes les connexions, triées par date
        $logins = Login::with('user')->orderBy('login_at', 'desc')->get();

        return view('logins.index', compact('logins'));
    }
}
