@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4">VIEW SKUs</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 10%;">SKU ID</th>
                        <th scope="col" style="width: 15%;">SKU Code</th>
                        <th scope="col" style="width: 20%;">SKU Name</th>
                        <th scope="col" style="width: 10%;">MRP</th>
                        <th scope="col" style="width: 15%;">Distributor Price</th>
                        <th scope="col" style="width: 15%;">Weight/Volume</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skus as $sku)
                    <tr>
                        <td>{{ $sku->id ?? '-' }}</td>
                        <td>{{ $sku->sku_code ?? '-' }}</td>
                        <td>{{ $sku->sku_name ?? '-' }}</td>
                        <td>{{ $sku->mrp ?? '-' }}</td>
                        <td>{{ $sku->distributor_price ?? '-' }}</td>
                        <td>{{ $sku->weight_volume ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
