@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2>Purchase Invoices</h2>
        <button id=print_bt onclick="window.print()" class="btn btn-primary">Print</button>
    </div>

    <!-- Invoice Container -->
    <div class="invoice-container">
        @foreach($data as $purchaseOrder)
            <div class="invoice">
                <div class="invoice-header">
                    <h5 class="invoice-title">Purchase Order: {{ $purchaseOrder->po_number }}</h5>
                    <p class="invoice-date"><strong>Date:</strong> {{ $purchaseOrder->date }}</p>
                </div>

                <div class="invoice-details row mb-4">
                    <div class="col-md-3"><strong>Zone:</strong> {{ $purchaseOrder->zone->longdescription }}</div>
                    <div class="col-md-3"><strong>Region:</strong> {{ $purchaseOrder->region->region_name }}</div>
                    <div class="col-md-3"><strong>Territory:</strong> {{ $purchaseOrder->territory->territory_name }}</div>
                    <div class="col-md-3"><strong>Distributor:</strong> {{ $purchaseOrder->distributor->name }}</div>
                </div>

                <h5>Invoice Details</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Number</th>
                            <th>Invoice Number</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $purchaseOrder->po_number }}</td>
                            <td>{{ $purchaseOrder->invoice_number }}</td>
                            <td>{{ $purchaseOrder->total }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="invoice-footer">
                    <p><strong>Total Amount: </strong> {{ $purchaseOrder->total }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

<style>
.invoice-container {
    grid-template-columns: repeat(2, 1fr);
    gap: 500px;
    margin-top: 30px;
    margin-bottom: 30px;
}

.invoice {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
}

th, td {
    padding: 8px 12px;
    text-align: left;
}

@media print {
    #print_bt {
        display: none !important;
    }

    body {
        background: white;
        font-family: Arial, sans-serif;
    }

    .invoice-container {
        display: block;
        margin: 0;
        padding: 0;
    }

    .invoice {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: none;
        page-break-inside: avoid;
        break-inside: avoid;
        page-break-after: always;
    }

    table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .invoice-footer {
        margin-top: 20px;
        text-align: right;
        font-weight: bold;
    }

    @page {
        margin: 20mm;
    }   
    
    nav, .admin-header, .welcome {
        display: none !important;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .container, .flex-grow-1 {
        width: 100% !important;
        padding: 0 !important;
    }

}
</style>
