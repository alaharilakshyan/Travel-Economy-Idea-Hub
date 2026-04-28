<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotImage extends Model
{
    protected $fillable = ['spot_id', 'image_path'];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
