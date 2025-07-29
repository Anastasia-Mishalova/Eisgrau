<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Для истории сделанных ставок
        $bids = Bid::where('user_id', $user->id)
            ->with('lot')
            ->orderBy('created_at', 'desc')
            ->get();

        $userLots = collect();
        if ($user->seller) {
            $userLots = $user->seller->lots()->get();
        }

        return view('profile', compact('user', 'bids', 'userLots'));
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

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => ['required'],
            'newPassword' => ['required', 'min:6', 'max:30', 'confirmed'], // требует поля `newPassword_confirmation`
        ]);

        $user = Auth::user();

        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'Неверный текущий пароль']);
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update(['password' => Hash::make($request->newPassword)]);

        return back()->with('success', 'Пароль успешно изменён');
    }
}
