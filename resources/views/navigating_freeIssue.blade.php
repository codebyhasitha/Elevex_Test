@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-center">
        <a href="{{ route('freeIssue.create') }}" class="btn btn-dark shadow mr-4 ">Add Free Issue</a>
        <a href="{{ route('freeIssue.index') }}" class="btn btn-dark shadow">View Free Issue</a>
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
