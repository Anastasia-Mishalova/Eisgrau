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
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withErrors(['email' => 'Неверный email или пароль.',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // TODO ВОЗМОЖНО СДЕЛАТЬ УДАЛЕНИЕ ТОКЕНА ИЗ БД

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
