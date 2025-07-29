<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ban_reason',
        'ban_date',
        'unban_date',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
