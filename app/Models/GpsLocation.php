<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GpsLocation extends Model
{
    protected $fillable = ['user_id', 'latitude', 'longitude', 'mileage'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
