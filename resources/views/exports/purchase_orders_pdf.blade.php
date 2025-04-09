@extends('layouts.app')

@section('content')
    <title>Purchase Orders PDF</title>

    <table>
        <thead>
            <tr>
                <th>PO Number</th>
                <th>Zone</th>
                <th>Region </th>
                <th>Territory </th>
                <th>Distributor </th>
                <th>Date</th>
                <th>Remark</th>
                <th>Total</th>
                <th>Invoice Number</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($purchaseOrders as $purchaseOrder)
    <tr>
        <td>{{ $purchaseOrder->po_number }}</td>
        <td>{{ $purchaseOrder->zone->longdescription }}</td>  
        <td>{{ $purchaseOrder->region->region_name }}</td>  
        <td>{{ $purchaseOrder->territory->territory_name }}</td>  
        <td>{{ $purchaseOrder->distributor->name }}</td>  
        <td>{{ $purchaseOrder->date }}</td>  
        <td>{{ $purchaseOrder->remark }}</td>  
        <td>{{ $purchaseOrder->total }}</td>  
        <td>{{ $purchaseOrder->invoice_number }}</td>  

        
    </tr>
@endforeach
        </tbody>
    </table>

@endsection


    <style>
        body {
            font-family: sans-serif;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>