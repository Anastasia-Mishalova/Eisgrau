<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function create()
    {
         return view('create-seller');
    }

    public function store(Request $request)
    {
        $request->validate([
            'citizenship' => 'required|string|max:100',
            'gender' => 'required|in:male,female',
            'passport_number' => 'required|string|max:50',
            'passport_issued_by' => 'required|string|max:150',
            'passport_photo' => 'required|image|max:10000', 
        ]);

        $user = Auth::user();

        $path = $request->file('passport_photo')->store('passport_photos', 'public');

        Seller::create([
            'user_id' => $user->id,
            'citizenship' => $request->citizenship,
            'gender' => $request->gender,
            'passport_number' => $request->passport_number,
            'passport_issued_by' => $request->passport_issued_by,
            'passport_photo_url' => $path,
        ]);

        return redirect()->route('profile')->with('success', 'Вы успешно стали продавцом!');
    }
}
