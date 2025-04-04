@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('zone') }}" class="btn btn-dark shadow">Zone</a>
        <a href="{{ route('region') }}" class="btn btn-dark shadow">Region</a>
        <a href="{{ route('territory') }}" class="btn btn-dark shadow">Territory</a>
        <a href="{{ route('users') }}" class="btn btn-dark shadow">Users</a>
        <a href="{{ route('product') }}" class="btn btn-dark shadow">Product</a>
        <a href="{{route('purchase_order.create')}}" class="btn btn-dark shadow"> Order</a>
        <a href="{{route('purchase_order.index')}}" class="btn btn-dark shadow">Purchase Order</a>
        <a href="{{ route('discount') }}" class="btn btn-dark shadow">Discount</a>
        <a href="{{ route('freeIssue') }}" class="btn btn-dark shadow">free Issue</a>
        

    </div>
</div>

<style>
    .btn {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 8px;
    transition: 0.3s;
}
.btn:hover {
    transform: scale(1.05);
}

</style>
@endsection

{{-- <script src="{{ asset('js/purchase_order.js') }}"></script> --}}





