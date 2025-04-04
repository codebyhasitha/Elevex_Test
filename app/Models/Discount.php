<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $fillable =   ['discount_name', 'purchase_product','discount_percent'];
}
