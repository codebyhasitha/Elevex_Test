<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Sku;     
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DiscountController extends Controller
{
  
    public function index()
    {
        $discounts = Discount::all();
        return view('Discount.discount_view', compact ('discounts'));
    }

    
    public function create()
    {
        $products = Sku::all();
        return view('Discount.add_discount', compact('products'));
    }

    public function store(Request $request)
    {
        $discount  = new discount();
        $discount-> discount_name = $request-> discount_name;
        $discount-> purchase_product = $request-> purchase_product;
        $discount-> discount_percent = $request-> discount_percent;
        $discount->save();
        return redirect()->back();
    }
    
    public function getProductDiscount(Request $request)
    {
        
    }
}
