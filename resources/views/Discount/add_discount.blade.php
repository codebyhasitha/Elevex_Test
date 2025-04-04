@extends('layouts.app')

@section('content')
    <h2>Discount Page</h2>

    <form action="{{ route('discount.store') }}" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
        @csrf
        <div style="margin-bottom: 15px; display: flex; align-items: center;">
            <label for="discount_name" style="width: 200px; font-weight: bold; margin-right: 10px;">Discount Label</label>
            <input type="text" name="discount_name" id="discount_name" required style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
   
        <div style="margin-bottom: 15px; display: flex; align-items: center;">
            <label for="purchase_product" style="width: 200px; font-weight: bold; margin-right: 10px;">Purchase Product</label>
            <select name="purchase_product" id="purchase_product" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">Select</option>
                @foreach($products as $product)
                    <option value="{{ $product->sku_id }}" data-name="{{ $product->sku_name }}">{{ $product->sku_name }}</option>
                @endforeach
            </select>
        </div>
 
        <div style="margin-bottom: 15px; display: flex; align-items: center;">
            <label for="discount_percent" style="width: 200px; font-weight: bold; margin-right: 10px;">Discount %</label>
            <input type="number" name="discount_percent" id="discount_percent" required style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px;">
            Save
        </button>
    </form>

    <script>
        
        document.getElementById('purchase_product').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('free_product').value = selectedOption.getAttribute('data-name');
        });
    </script>

@endsection
