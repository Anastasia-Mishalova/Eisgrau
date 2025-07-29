<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiltersOption extends Model
{
    protected $table = 'filters_options';

    public function filter()
    {
        return $this->belongsTo(Filter::class, 'filter_id');
    }
}
