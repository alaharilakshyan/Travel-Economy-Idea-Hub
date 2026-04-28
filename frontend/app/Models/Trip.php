<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['user_id', 'title', 'start_date', 'end_date', 'notes'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spots()
    {
        return $this->hasMany(TripSpot::class)->orderBy('day_number')->orderBy('order');
    }
}
