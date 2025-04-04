@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4">VIEW DISCOUNTS</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 20%;">Discount Label</th>
                        <th scope="col" style="width: 40%;">Purchase Product</th>
                        <th scope="col" style="width: 20%;">Discount Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($discounts as $discount)
                    <tr>
                        <td>{{ $discount->discount_name ?? '-' }}</td>
                        <td>{{ $discount->purchase_product ?? '-' }}</td>
                        <td>{{ $discount->discount_percent ?? '-' }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
