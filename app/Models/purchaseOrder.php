<?php

namespace App\Models;
use App\Models\PurchaseOrderItem;

use Illuminate\Database\Eloquent\Model;

class purchaseOrder extends Model
{
    protected $fillable = ['po_number', 'zone_id', 'region_id', 'territory_id', 'distributor_id', 'date', 'remark','total','invoice_number'];

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }
}
