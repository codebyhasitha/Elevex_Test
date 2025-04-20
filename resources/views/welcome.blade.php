@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h4 class="mb-4 text-center">Navigation</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                <div class="col">
                    <a href="{{ route('zone') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Zone</a>
                </div>
                <div class="col">
                    <a href="{{ route('region') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Region</a>
                </div>
                <div class="col">
                    <a href="{{ route('territory') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Territory</a>
                </div>
                <div class="col">
                    <a href="{{ route('users') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Users</a>
                </div>
                <div class="col">
                    <a href="{{ route('product') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Product</a>
                </div>
                <div class="col">
                    <a href="{{ route('purchase_order.create') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">New Order</a>
                </div>
                <div class="col">
                    <a href="{{ route('purchase_order.index') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Purchase Orders</a>
                </div>
                <div class="col">
                    <a href="{{ route('freeIssue') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Free Issue</a>
                </div>
                <div class="col">
                    <a href="{{ route('discount') }}" class="btn btn-outline-dark w-100 py-3 shadow-sm">Discount</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<style>
    .btn {
        font-size: 16px;
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    .btn:hover {
        transform: scale(1.03);
    }

    .card {
        border-radius: 16px;
    }
</style>
@endsection
