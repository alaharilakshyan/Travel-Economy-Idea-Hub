<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerActivity extends Model
{
    protected $fillable = ['title', 'description', 'location', 'event_date', 'start_time', 'end_time', 'max_participants', 'status'];

    protected $casts = [
        'event_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->hasMany(VolunteerApplication::class, 'activity_id');
    }

    public function approvedApplications()
    {
        return $this->applications()->where('status', 'approved');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')->where('event_date', '>=', now());
    }
}
