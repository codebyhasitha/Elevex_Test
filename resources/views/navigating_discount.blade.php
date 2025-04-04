@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-center">
        <a href="{{ route('discount.create') }}" class="btn btn-dark shadow mr-4">Add Discount</a>
        <a href="{{ route('discount.index') }}" class="btn btn-dark shadow">View Discount</a>
    </div>

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
.mr-4 {
        margin-right: 20px; 
    }

</style>
@endsection







