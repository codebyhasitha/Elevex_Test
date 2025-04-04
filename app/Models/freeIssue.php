<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class freeIssue extends Model
{
    protected $table = 'freeIssue';
    protected $fillable = [
        'freeissue_name', 'freeissue_type', 'purchse_product', 
        'free_prodcut', 'purchase_Quantity', 'Free_Quantity'
    ];

    public function sku()
    {
        return $this->belongsTo(Sku::class);
    }
}
