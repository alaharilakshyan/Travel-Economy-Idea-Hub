<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    protected $fillable = ['activity_id', 'user_id', 'message', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->belongsTo(VolunteerActivity::class, 'activity_id');
    }
}
