<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['user_id', 'spot_id', 'title', 'description', 'category', 'location', 'status', 'upvotes_count', 'media'];

    protected $casts = [
        'media' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(IdeaVote::class);
    }
}
