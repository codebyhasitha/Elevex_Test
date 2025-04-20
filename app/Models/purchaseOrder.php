<?php

namespace App\Models;
use App\Models\PurchaseOrderItem;

use Illuminate\Database\Eloquent\Model;

class purchaseOrder extends Model
{
    protected $fillable = ['po_number', 'zone_id', 'region_id', 'territory_id', 'distributor_id','sku_id', 'date', 'remark','total','invoice_number','sku_name'];

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }
    public function collection()
    {
        return PurchaseOrder::all();
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function region()
    {
        return $this->belongsTo(rregion::class);
    }

    public function territory()
    {
        return $this->belongsTo(tterritory::class);
    }

    public function distributor()
    {
        return $this->belongsTo(User::class);
    }
    // public function products()
    // {
    //     return $this->belongsToMany(Sku::class);
    // }

    public function purchaseOrder()
    {
        return $this->belongsTo(purchaseOrder::class, 'purchase_order_id');
    }
    // public function Orders()    
    // {
    //     return $this->belongsTo(PurchaseOrderItem::class);
    // }
}
