<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Валидация входных данных
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validate, $request->boolean('remember'))) {
            //для защиты от подмены сешн ид, TODO НАЙТИ ПОДРОБНУЮ СТАТЬЮ О РАБОТЕ ПОД КАПОТОМ
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->withErrors(['email' => 'Неверный email или пароль.',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
