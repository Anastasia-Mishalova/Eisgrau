<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
        protected $casts = [
    'auction_end' => 'datetime',];

    //для деланья ставки
    public function bids() {
    return $this->hasMany(Bid::class);
}
}
