    @extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
        <h2>Add Individual Purchase Order</h2>

        {{-- <form method="POST" action="{{ route('purchase_order.store') }}"> --}}
        <form method="POST" action="{{url('/purchase_order/store')}}">
            @csrf
            @if(session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <label for="zone_id" class="form-label">Zone</label>
                    <select onchange="load_region()" class="form-control form-control-sm" name="zone_id" id="zone_id">
                        <option value="">Select</option>
                        @foreach ($zones as $zone)
                            <option value="{{$zone->id}}">{{ $zone->longdescription }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="region" class="form-label">Region</label>
                    <select onchange="load_territory()" class="form-control form-control-sm" name="region_id" id="region_id">
                        <option value="">Select</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="territory" class="form-label">Territory</label>
                    <select onchange="load_distributor()" class="form-control form-control-sm" name="territory" id="territory">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="distributor_id" class="form-label">Distributor</label>
                    <select class="form-control form-control-sm" name="distributor_id" id="distributor_id">
                        <option value="">Select</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="Remark" class="form-label">Remark</label>
                    <input type="text" class="form-control form-control-sm" name="Remark" id="Remark" placeholder="Remark">
                </div>
            </div>

            <h3 style="text-align:center">Products</h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>SKU Code</th>
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Enter Quantity</th>
                        <th>Units</th>
                        <th>Total Price</th>
                        <th>Free Issue</th>
                        <th>Discount</th>
                        <th>Final Price</th>
                    </tr>
                </thead>
                @php
                    $count=1;
                @endphp
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->sku_id }}</td>
                        <td>{{ $product->sku_name }}</td>
                        <td>{{ $product->mrp }}</td>
                        <td>
                            {{-- <input type="text" class="form-control" name="cases" id="cases_{{ $product->id }}" onkeyup="units_cal({{$product->  id}})"> --}}
                            <input type="text" class="form-control" name="cases" id="cases_{{ $product->id }}"
                                onkeyup="units_cal({{ $product->id }}); calculate_discount({{ $product->id }});">
                            <!-- <input type="text" class="form-control" name="cases" id="cases_{{ $product->id }}"> -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="units" id="units_{{ $product->id }}" readonly>
                        </td>
                        <td>
                            <!-- <input type="text" class="form-control" name="price" id="price_{{ $product->id }}" readonly>
                            <input type="hidden" class="form-control" name="total_amnt" id="total_amnt_{{$product->id}}" readonly> -->
                            <input type="text" class="form-control" name="price" id="price_{{ $product->id }}" readonly>
                        <input type="hidden" class="form-control" name="total_amnt" id="total_amnt_{{$product->id}}" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="freeIssue" id="freeIssue_{{ $product->id }}"readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="discount" id="discount_{{ $product->id }}" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="final_price" id="final_price_{{ $product->id }}" readonly>
                        </td>



                    </tr>
                    {{-- <td> <input type="text" style="text-align: center"
                            id="total_amnt_{{$count}}"
                            name="products[{{$count}}][total_amnt]" readonly
                            class="col-md-12 form-control form-control-sm"
                            autocomplete="off" /></td> --}}

                    @php
                        $count++;
                        //dd($count);
                    @endphp
                    @endforeach
                </tbody>
            </table>
            <div style="text-align:center">
                <input type="text" class="form-control" name="total" id="total" readonly/>
            </div>
            <label for="total" class="form-label fw-bold">Total Amount</label>
            <input type="hidden" class="form-control text-center fw-bold w-25 mx-auto" name="pro_count" id="pro_count" value="{{$count}}" readonly/>

            <div class="text-center mt-3 ">
                <button type="button" class="btn btn-primary w-50 py-2" onclick="form_submit()">Add PO</button>
            </div>
        </form>
        </div>
    </div>
    <script>
        function load_region() {
            $.ajax({
                type: "POST",
                url: "{{ url('/load/region') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'zone_id': $('#zone_id').val()
                },

                success: function (data) {
                    // console.log(data)
                    $('#region_id').empty();
                    $('#region_id').append('<option value="">SELECT REGION</option>');
                    for (var i = 0; i < data.length; i++) {
                        $('#region_id').append('<option value="'+data[i].id+'">'+data[i].region_name+'</option>');
                    }
                }
            });
        }
        function load_territory() {
            $.ajax({
                type: "POST",
                url: "{{ url('/load/territory') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'region_id': $('#region_id').val()
                },

                success: function (data) {
                    //console.log(data)
                    $('#territory').empty();
                    $('#territory').append('<option value="">SELECT TERRITORY</option>');
                    for (var i = 0; i < data.length; i++) {
                        $('#territory').append('<option value="'+data[i].id+'">'+data[i].territory_name+'</option>');
                    }
                }
            });
        }
        function load_distributor() {
            $.ajax({
                type: "POST",
                url: "{{ url('/load/distributor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'territory': $('#territory').val()
                },

                success: function (data) {
                    // console.log(data)
                    $('#distributor_id').empty();
                    $('#distributor_id').append('<option value="">SELECT DISTRIBUTOR</option>');
                    for (var i = 0; i < data.length; i++) {
                        $('#distributor_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                    }
                }
            });
        }
        function units_cal(pro_id) {
            let casesValue = $('#cases_' + pro_id).val();

            // console.log(pro_count)
            $.ajax({
                type: "POST",
                url: "{{ url('/load/units_cal') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'cases': casesValue,
                    'pro_id': pro_id
                },

                success: function (data) {
                // console.log("Response:", data);
                if (data !== undefined) {
                    $('#units_' + pro_id).val(data.units);
                    $('#price_' + pro_id).val(data.price);
                    $('#freeIssue_' + pro_id).val(data.freeQty);

                    calculate_amt(data.price);
                    calculate_discount(pro_id,data.price);



                } else {
                    console.error("Units field not found in response");
                }
            },

            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
            });
        }


        function calculate_amt(data) {
            var total_amount = 0;

            $('input[id^="final_price_"]').each(function() {
                var amount = $(this).val().replace(/,/g, '');

                if (amount !== "" && !isNaN(parseFloat(amount))) {
                    total_amount += parseFloat(amount);
                }
            });

            // $('#total').val(total_amount.toFixed(2));
            $('#total').val("Rs. " + new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(total_amount));
            return total_amount;
        }


        function calculate_discount(pro_id,price) {
            $.ajax({
                type: "POST",
                url: "{{ url('/load/product_discount') }}",

                data: {

                    "_token": "{{ csrf_token() }}",
                    'pro_id': pro_id,
                    'price': price,

                },
                success: function (data) {

                    console.log("Response:", data);
                   // console.log("Response from server:", data);
                    if (data !== undefined) {
                        $('#discount_' + pro_id).val(data.disAmnt);
                        calculate_disamt(data.disAmnt);
                    } else {
                        console.error("Discount field not found in response");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }

        function calculate_disamt(data) {
            var total_amount = 0;

            $('input[id^="discount_"]').each(function() {
                var amount = $(this).val().replace(/,/g, '');

                if (amount !== "" && !isNaN(parseFloat(amount))) {
                    total_amount += parseFloat(amount);
                }
            });

            // $('#total').val(total_amount.toFixed(2));
            $('#total').val("Rs. " + new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(total_amount));
        }

        function form_submit() {

            let formData = {
                zone_id: document.getElementById("zone_id").value,
                region_id: document.getElementById("region_id").value,
                territory: document.getElementById("territory").value,
                distributor_id: document.getElementById("distributor_id").value,
                remark: document.getElementById("Remark").value,
                total: document.getElementById("total").value,
                products: []
            };

            let productRows = document.querySelectorAll("tbody tr");
            productRows.forEach(row => {
                let product = {
                    sku_code: row.cells[0].innerText,
                    product_name: row.cells[1].innerText,
                    unit_price: row.cells[2].innerText,
                    quantity: row.querySelector(`input[name='cases']`).value,
                    units: row.querySelector(`input[name='units']`).value,
                    total_price: row.querySelector(`input[name='price']`).value,
                    free_issue: row.querySelector(`input[name='freeIssue']`).value
                };

                if (product.quantity && product.quantity > 0) {
                    formData.products.push(product);
                }
            });

            fetch("{{url('/purchase_order/store')}}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector("input[name='_token']").value
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {

                }
            })
            .catch(error => console.error("Error:", error));
        }

    </script>
    @endsection

    {{-- <script src="{{ asset('js/purchase_order.js') }}"></script> --}}

