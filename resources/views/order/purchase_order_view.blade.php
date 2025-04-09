@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 class="text-center mb-4">Purchase Order View</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- <form method="POST" action="{{ route('purchase_order.index') }}">
            @csrf --}}

            <!-- Dropdowns in a single row -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="region" class="form-label">Region</label>
                    <select onchange="load_territory()" class="form-control" name="region_id" id="region_id">
                        <option value="">Select</option>
                        @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{ $region->region_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="territory" class="form-label">Territory</label>
                    <select onchange="load_po()" class="form-control" name="territory" id="territory">
                        <option value="">Select</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="po_number" class="form-label">PO Number</label>
                    <select xonchange="load_table(this.value)" class="form-control" name="po_number" id="po_number">
                        <option value="">Select</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="po_number" class="form-label">Date From</label>
                    <input type="date" class="form-control" name="from_date" id="from_date">
                </div>

                <div class="col-md-4">
                    <label for="po_number" class="form-label">Date To</label>
                    <input type="date" class="form-control" name="to_date" id="to_date">
                </div>
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-danger" id="bulk_button">
                    Bulk
                </button>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success" onclick="load_table(event)">
                    Search
                </button>
            </div>

            {{-- <div class="col-md-4 d-flex justify-content-end">
                <button type="button" class="btn btn-danger me-2" id="bulk_button">
                    Bulk
                </button>

                <button type="submit" class="btn btn-success" onclick="load_table(event)">
                    Search
                </button>
            </div> --}}


            <!-- Table -->
            <h3 class="text-center">Purchase Order Details</h3>
            <div class="table-responsive">
                <table id="purchase_orders" class="table table-striped table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th><input class="form-check-input" type="checkbox" value="" id="all_check"></th>
                            <th>Region</th>
                            <th>Territory</th>
                            <th>Distributor</th>
                            <th>PO Number</th>
                            <th>Invoice Number</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        {{-- </form> --}}
                
        <nav id="pagination-nav" class="mt-4">
            <ul class="pagination justify-content-center"></ul>
        </nav>
                <a href="{{ route('export.excel') }}" class="btn btn-success" id="export_excel">Export to Excel</a>   
                <a href="{{ route('export.pdf') }}" class="btn btn-danger" id="export_pdf">Export to PDF</a>
                <a href="{{ route('Invoice_Print') }}" class="btn btn-primary" id="preview_print">Preview to Print</a>
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
                // for (var i = 0; i < data.length; i++) {
                //     $('#region_id').append('<option value="'+data[i].id+'">'+data[i].region_name+'</option>');
                // }
                data.forEach(function(region) {
                    $('#region_id').append('<option value="' + region.id + '">' + region.region_name + '</option>');
                });
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
                // console.log(data)
                $('#territory').empty();
                $('#territory').append('<option value="">SELECT TERRITORY</option>');
                // for (var i = 0; i < data.length; i++) {
                //     $('#territory').append('<option value="'+data[i].id+'">'+data[i].territory_name+'</option>');
                // }
                data.forEach(function(territory) {
                    $('#territory').append('<option value="' + territory.id + '">' + territory.territory_name + '</option>');
                });
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
    function load_po() {
        $.ajax({
            type: "POST",
            url: "{{ url('/load/po_number') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'territory': $('#territory').val()
            },

            success: function (data) {
                
                $('#po_number').empty();
                $('#po_number').append('<option value="">SELECT PO NUMBER</option>');
                // for (var i = 0; i < data.length; i++) {
                //     $('#po_number').append('<option value="'+data[i].id+'">'+data[i].po_number+'</option>');
                // }
                data.forEach(function(po) {
                    $('#po_number').append('<option value="' + po.id + '">' + po.po_number + '</option>');
                });
            }
        });
    }
    $(document).ready(function () {
        $('#all_check').on('change', function () {
            let isChecked = $(this).prop('checked');
            $('#purchase_orders tbody input[type="checkbox"]').prop('checked', isChecked);
        });

        $('#bulk_button').on('click', function () {
            let selectedPoIds = [];

            $('.row-check:checked').each(function () {
                let poId = $(this).data('po-id');
                selectedPoIds.push(poId);
            });
            console.log(selectedPoIds)
            // if (selectedPoIds.length === 0) {
            //     $.alert({
            //         title: 'Alert',
            //         icon: 'fa fa-warning',
            //         type: 'red',
            //         content: 'Please select at least one PO!'
            //     });
            //     return;
            // }

            // Call bulk conversion function
            bulk_conversion(selectedPoIds);
        });
    });
    // function bulk_conversion(poIds) {
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ url('/bulk_conversion') }}",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "po_ids": poIds
    //         },
    //         success: function (response) {
    //             if (response.success) {
    //                 alert(response.message);
    //                 window.location.href = response.redirect;
    //             } else {
    //                 alert('Bulk conversion failed!');
    //             }
    //         },
    //         error: function (error) {
    //             console.error("Error:", error);
    //             alert('Something went wrong! Please try again.');
    //         }
    //     });
    // }
    $('#bulk_button').on('click', function () {
        let selectedPoIds = [];

        // Collect selected PO IDs from checked checkboxes
        $('.row-check:checked').each(function () {
            let poId = $(this).data('po-id');
            selectedPoIds.push(poId);
        });

        if (selectedPoIds.length === 0) {
            $.alert({
                title: 'Alert',
                icon: 'fa fa-warning',
                type: 'red',
                content: 'Please select at least one PO!'
            });
            return;
        }

        // Call the bulk conversion function
        bulk_conversion(selectedPoIds);
    });

    function bulk_conversion(poIds) {
        $.ajax({
            type: "POST",
            url: "{{ url('/bulk_conversion') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "po_ids": poIds
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = response.redirect;  // Redirect to the purchase order index
                } else {
                    alert('Bulk conversion failed!');
                }
            },
            error: function (error) {
                console.error("Error:", error);
                alert('Something went wrong! Please try again.');
            }
        });
    }

    function load_table(event, page = 1) {
    if (event) event.preventDefault();

    let region_id = $('#region_id').val();
    let territory_id = $('#territory').val();
    let po_number = $('#po_number').val();
    let from_date = $('#from_date').val();
    let to_date = $('#to_date').val();  

    if ((from_date && !to_date) || (!from_date && to_date)) {
        $.alert({
            title: 'Alert',
            icon: 'fa fa-warning',
            type: 'blue',
            content: 'Please select both From Date and To Date!'
        });
        return;
    }

    let data = {
        "_token": "{{ csrf_token() }}",
        "region_id": region_id,
        "territory_id": territory_id,
        "po": po_number,
        "from_date": from_date,
        "to_date": to_date,
        "page": page 
    };

    $.ajax({
        type: "POST",
        url: "{{ url('/table_data') }}",
        data: data,
        success: function (response) {
            let tableBody = $('#purchase_orders tbody');
            tableBody.empty();

            if (response.po.length === 0) {
                tableBody.append(`<tr><td colspan="9" class="text-center">No records found</td></tr>`);
                $('#pagination-nav .pagination').empty();
                return;
            }

            response.po.forEach(product => {
                let createdAt = new Date(product.created_at).toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });

                let row = `
                    <tr>
                        <td><input class="form-check-input row-check" type="checkbox" data-po-id="${product.id}"></td>
                        <td>${product.region_name}</td>
                        <td>${product.territory_name}</td>
                        <td>${product.name}</td>
                        <td>${product.po_number}</td>
                        <td>${product.invoice_number ?? ''}</td>
                        <td>${product.date}</td>
                        <td>${createdAt}</td>
                        <td>${product.total ?? ''}</td>
                    </tr>
                `;
                tableBody.append(row);
            });

            // Handle pagination buttons
            let pagination = response.pagination;
            let paginationContainer = $('#pagination-nav .pagination');
            paginationContainer.empty();

            // Previous
            if (pagination.current_page > 1) {
                paginationContainer.append(`
                    <li class="page-item">
                        <a class="page-link" href="#" data-page="${pagination.current_page - 1}">Previous</a>
                    </li>
                `);
            }

            // Page numbers
            for (let i = 1; i <= pagination.last_page; i++) {
                paginationContainer.append(`
                    <li class="page-item ${i === pagination.current_page ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>
                `);
            }

            // Next
            if (pagination.current_page < pagination.last_page) {
                paginationContainer.append(`
                    <li class="page-item">
                        <a class="page-link" href="#" data-page="${pagination.current_page + 1}">Next</a>
                    </li>
                `);
            }
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        }
    });
}

    function units_cal(pro_id) {
        let casesValue = $('#cases_' + pro_id).val();
        $.ajax({
            type: "POST",
            url: "{{ url('/load/units_cal') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'cases': casesValue,
                'pro_id': pro_id
            },

            success: function (data) {
            console.log("Response:", data);
            if (data !== undefined) {
                $('#units_' + pro_id).val(data.units);
                $('#price_' + pro_id).val(data.price);
            } else {
                console.error("Units field not found in response");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
        }
        });
    }

    $(document).ready(function () {
    
    $(document).on('click', '.pagination .page-link', function (e) {
        e.preventDefault();
        let page = $(this).data('page');
        load_table(null, page); 
    });
});

$('#export_excel').on('click', function() {
    let region_id = $('#region_id').val();
    let territory_id = $('#territory').val();
    let po_number = $('#po_number').val();
    // let from_date = $('#from_date').val();
    // let to_date = $('#to_date').val();

    // Construct the URL with query parameters/
    let url = "{{ route('export.excel') }}";
    url += '?region_id=' + region_id;
    url += '&territory=' + territory_id;
    url += '&po_number=' + po_number;
    // url += '&from_date=' + from_date;
    // url += '&to_date=' + to_date;

    // Navigate to the constructed URL
    window.location.href = url;

    console.log('URL:', url); // Debugging: Check the constructed URL
});

// $('#export_excel').on('click', function () {
//     let region_id = $('#region_id').val();
//     let territory = $('#territory').val();
//     let po_number = $('#po_number').val();
//     let from_date = $('#from_date').val();
//     let to_date = $('#to_date').val();

//     $.ajax({
//         type: "POST",
//         url: "{{ url('/export/excel') }}", 
//         data: {
//             "_token": "{{ csrf_token() }}",  
//             "region_id": region_id,
//             "territory": territory,
//             "po_number": po_number,
//             "from_date": from_date,
//             "to_date": to_date
//         },
//         success: function (response) {
//             if (response.success) {
                
//                 window.location.href = response.url;  
//             } else {
//                 alert('Export failed!');
//             }
//         },
//         error: function (error) {
//             console.error("Error:", error);
//             alert('Something went wrong. Please try again!');
//         }
//     });
// });


</script>
@endsection

{{-- <script src="{{ asset('js/purchase_order.js') }}"></script> --}}
<style>
    .pagination .page-link {
        color: #000;
        background-color: #fff;
        border: 1px solid #000;
    }

    .pagination .page-item.active .page-link {
        color: #fff;
        background-color: #000;
        border-color: #000;
    }

    .pagination .page-link:hover {
        background-color: #000;
        color: #fff;
    }
</style>

