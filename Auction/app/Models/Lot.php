<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $casts = [
        'auction_end' => 'datetime',
    ];

    //для деланья ставки
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_lot', 'lot_id', 'category_id');
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'filters_lot', 'lot_id', 'filter_id');
    }

    public function filterOptions()
    {
        return $this->belongsToMany(FiltersOption::class, 'filters_options_lot', 'lot_id', 'filter_option_id');
    }
}
