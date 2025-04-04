<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseOrder;

class PurchaseOrderItem extends Model
{
    protected $fillable = ['purchase_order_id', 'product_id', 'unit_price', 'quantity', 'total_price'];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
    public function product()
    {
        return $this->belongsTo(sku::class);  
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);  
    }
}
