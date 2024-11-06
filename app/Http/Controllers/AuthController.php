<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        if (Auth::attempt($request->only('email','password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->to('/')->with('info','Tus credenciales no coinciden con nuestros registros');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }
}
