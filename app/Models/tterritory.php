<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tterritory extends Model
{
    //

    // public function user(){
    //     return $this->belongsTo(User::class, 'id','territory_id');
    // }
    // public function zone()
    // {
    //     return $this->belongsTo(Zone::class,'zone_id', 'id');
    // }
    public function zone(){
        // return $this->hasMany(zone::class, 'id','zone_id');
        return $this->belongsTo(Zone::class,'zone_id', 'id');
    }

    public function region(){
        return $this->belongsTo(rregion::class, 'region_id','id');
    }
}
