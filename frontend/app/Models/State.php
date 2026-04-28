<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image'];

    public function spots()
    {
        return $this->hasMany(Spot::class);
    }
}
