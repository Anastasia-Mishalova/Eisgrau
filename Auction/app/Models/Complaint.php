<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'reporter_id',
        'reported_user_id',
        'reported_auction_id',
        'complaint_title',
        'complaint_descr',
        'evidence_photo_url',
        'status',
        'submitted_at',
    ];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    public function reportedAuction()
    {
        return $this->belongsTo(Lot::class, 'reported_auction_id');
    }
}
