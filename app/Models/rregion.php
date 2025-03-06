<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rregion extends Model
{
    public function zone(){
        return $this->hasMany(zone::class, 'id','zone_id');
    }

}
