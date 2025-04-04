<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
    public function orders()
    {
        return $this->hasMany(PurchaseOrderItem::class);  
    }
}
