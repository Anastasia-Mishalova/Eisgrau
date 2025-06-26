<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        //хз как это работает, но пришлось явно указать тип переменной чтобы update не светился красным (хотя и без этого работал)
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'bio' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:30',
            'birth_date' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:7168',
        ]);

        if ($request->hasFile('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;

            $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');

            $validated['avatar_url'] = $path;

        }

        $user->update($validated);

        return redirect()->route('profile');
    }
}
