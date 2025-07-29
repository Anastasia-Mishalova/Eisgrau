<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'user_id',
        'citizenship',
        'gender',
        'passport_number',
        'passport_issued_by',
        'passport_photo_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lots()
{
    return $this->hasMany(Lot::class);
}
}
