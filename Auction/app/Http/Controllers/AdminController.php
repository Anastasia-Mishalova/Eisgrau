<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Complaint;
use App\Models\BannedUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        $sellers = Seller::with('user')
            ->whereHas('user', function ($q) use ($query) {
                $q->where('first_name', 'like', "%$query%")
                    ->orWhere('last_name', 'like', "%$query%")
                    ->orWhere('email', 'like', "%$query%");
            })
            ->get();

        $lots = Lot::with('seller.user')
            ->where('title', 'like', "%$query%")
            ->orWhereHas('seller.user', function ($q) use ($query) {
                $q->where('first_name', 'like', "%$query%")
                    ->orWhere('last_name', 'like', "%$query%");
            })
            ->get();

        return response()->json([
            'users' => $users,
            'sellers' => $sellers,
            'lots' => $lots,
            'csrf' => csrf_token(),
        ]);
    }


    public function home()
    {
        $lots = Lot::with('seller')->get();
        $users = User::all();
        $sellers = Seller::all();
        $admins = Admin::all();

        $usersCount = User::count();
        $sellersCount = Seller::count();
        $lotsCount = Lot::count();
        $bansCount = BannedUser::count();
        $complaintsCount = Complaint::count();


        $complaints = Complaint::with(['reporter', 'reportedUser', 'reportedAuction'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.home-admin', compact(
            'lots',
            'users',
            'sellers',
            'usersCount',
            'sellersCount',
            'lotsCount',
            'bansCount',
            'admins',
            'complaints',
            'complaintsCount'
        ));
    }


    public function showLot($id)
    {
        $lot = Lot::with('seller')->findOrFail($id);
        return view('admin.lots.show', compact('lot'));
    }

    public function destroyLot($id)
    {
        $lot = Lot::findOrFail($id);

        $lot->delete();

        return redirect()->route('admin.home')->with('success', 'Лот успешно удалён');
    }

    public function banUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'ban_reason' => 'required|string|max:255',
        ]);

        BannedUser::create([
            'user_id' => $id,
            'ban_reason' => $request->ban_reason,
        ]);

        $user->is_baned = true;
        $user->save();

        return redirect()->back()->with('success', 'Пользователь забанен.');
    }


    public function unbanUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_baned = false;
        $user->save();

        BannedUser::where('user_id', $id)->delete();

        return redirect()->back()->with('success', 'Пользователь разбанен.');
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,approved,rejected',
    ]);

    $complaint = Complaint::findOrFail($id);
    $complaint->status = $request->input('status');
    $complaint->save();

    return redirect()->back()->with('success', 'Статус жалобы успешно обновлен.');
}
}
