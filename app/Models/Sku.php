<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku_id', 'sku_code', 'sku_name', 'mrp', 'distributor_price', 'weight_volume','units'
    ];
}
