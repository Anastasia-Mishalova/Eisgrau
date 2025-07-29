<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function options()
    {
        return $this->hasMany(FiltersOption::class, 'filter_id');
    }
}
