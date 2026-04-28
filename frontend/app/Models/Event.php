<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['spot_id', 'title', 'description', 'event_date', 'max_volunteers', 'cover_image'];

    protected $casts = [
        'event_date' => 'datetime',
    ];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(User::class, 'volunteers')->withPivot('registered_at')->withTimestamps();
    }
}
