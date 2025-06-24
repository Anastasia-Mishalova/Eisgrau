<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:30'],
            'lastname'  => ['required', 'string', 'max:30'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', 'min:6', 'max:30'],
        ]);

        // Создание пользователя
        $user = User::create([
            'first_name' => $validated['firstname'],
            'last_name'  => $validated['lastname'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
        ]);

        // Автоматический вход
        Auth::login($user);

        // TODO НЕ ПОЛУЧАЕТСЯ СДЕЛАТЬ ЗАЩИЩЕННЫЕ СТРАНИЦЫ, НЕ ЗАБЫТЬ СДЕЛАТЬ ПОЗЖЕ!!!!
        return redirect('/home');
    }
}
