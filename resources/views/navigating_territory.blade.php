@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{route('territory.create')}}" class="btn btn-dark shadow">Territory</a>
        <a href="{{route('territory.index')}}" class="btn btn-dark shadow">Territory view</a>


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







