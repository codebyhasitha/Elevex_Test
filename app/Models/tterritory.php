<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tterritory extends Model
{
    //

    // public function user(){
    //     return $this->belongsTo(User::class, 'id','territory_id');
    // }

    public function region(){
        return $this->hasMany(rregion::class, 'id','region_id');
    }
}
