<?php

namespace App\Http\Controllers;
Use App\Models\Sku;
use App\Models\tterritory;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function index() {
        $skus = Sku::all();
        return view('product.view_sku', compact('skus'));
    }

    public function product_create()
    {
        return view('product.add_product');
    }

    public function Product_store(Request $request)
    {
        $request->validate([
            'sku_code' => 'required|string|max:255|unique:skus,sku_code',
            'sku_name' => 'required|string|max:255',
            'mrp' => 'required|numeric|min:0',
            'distributor_price' => 'required|numeric|min:0',
            'units' => 'required|numeric|min:0',
            'weight_volume' => 'required|string|max:50',
        ]);

        Sku::create([
            'sku_id' => 'AUTO-' . rand(1000, 9999),
            'sku_code' => $request->sku_code,
            'sku_name' => $request->sku_name,
            'mrp' => $request->mrp,
            'distributor_price' => $request->distributor_price,
            'weight_volume' => $request->weight_volume,
            'units' => $request->units,
        ]);

        return redirect()->back()->with('success', 'SKU added successfully!');
    }
}
