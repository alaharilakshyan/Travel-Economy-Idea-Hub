<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripSpot extends Model
{
    protected $fillable = ['trip_id', 'spot_id', 'day_number', 'order', 'visit_note'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
