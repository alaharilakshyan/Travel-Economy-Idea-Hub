<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = [
        'state_id', 'name', 'slug', 'description', 'category', 
        'cover_image', 'latitude', 'longitude', 'rating_avg'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function images()
    {
        return $this->hasMany(SpotImage::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
