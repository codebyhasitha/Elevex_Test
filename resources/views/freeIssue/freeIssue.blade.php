    @extends('layouts.app')

    @section('content')
        <h2>Free Issue</h2>

        <form action="{{ route('freeIssue.store') }}" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
            @csrf

            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label for="freeissue_name" style="width: 200px; font-weight: bold; margin-right: 10px;">Free Issue Label</label>
                <input type="text" name="freeissue_name" id="freeissue_name" required style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label for="freeissue_type" style="width: 200px; font-weight: bold; margin-right: 10px;">Free Issue Type</label>
                <select name="freeissue_type" id="freeissue_type" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="flat">Flat</option>
                    <option value="multiple">Multiple</option>
                </select>
            </div>

            
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
            <label for="purchse_product" style="width: 200px; font-weight: bold; margin-right: 10px;">Purchase Product</label>
                <select name="purchse_product" id="purchse_product" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="">Select</option>
                    @foreach($products as $product)
                        <!-- <option value="{{ $product->sku_id }}" data-name="{{ $product->sku_name }}">{{ $product->sku_name }}</option> -->
                        <option value="{{ $product->sku_id }}" data-name="{{ $product->sku_name }}">{{ $product->sku_name }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label for="free_prodcut" style="width: 200px; font-weight: bold; margin-right: 10px;">Free Product</label>
                <input type="text" id="free_prodcut" name="free_prodcut" readonly style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f1f1f1;">
            </div>

            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label for="purchase_Quantity" style="width: 200px; font-weight: bold; margin-right: 10px;">Purchase Quantity</label>
                <input type="number" name="purchase_Quantity" id="purchase_Quantity" required style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label for="Free_Quantity" style="width: 200px; font-weight: bold; margin-right: 10px;">Free Quantity</label>
                <input type="number" name="Free_Quantity" id="Free_Quantity" required style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px;">
                Save</button>
        </form>

        <script>
        document.getElementById('purchse_product').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('free_prodcut').value = selectedOption.getAttribute('data-name');
        });
    </script>

    @endsection
