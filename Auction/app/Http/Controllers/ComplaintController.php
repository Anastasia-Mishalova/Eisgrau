<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function create($lotId)
    {
        $lot = Lot::findOrFail($lotId);
        return view('complaints.create', compact('lot'));
    }

    public function store(Request $request, $lotId)
    {
        $request->validate([
            'complaint_title' => 'required|max:255',
            'complaint_descr' => 'required|max:3000',
            'evidence_photo_url' => 'nullable|url',
        ]);

        $lot = Lot::findOrFail($lotId);

        Complaint::create([
            'reporter_id' => Auth::id(),
            'reported_user_id' => $lot->user_id,
            'reported_auction_id' => $lotId,
            'complaint_title' => $request->complaint_title,
            'complaint_descr' => $request->complaint_descr,
            'evidence_photo_url' => $request->evidence_photo_url,
            'status' => 'pending',
        ]);

        return redirect()->route('lots.show', $lotId)->with('success', 'Жалоба отправлена.');
    }
}
