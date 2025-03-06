@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4">VIEW REGIONS</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 20%;">Region Code</th>
                        <th scope="col" style="width: 30%;">Region Name</th>
                        <th scope="col" style="width: 30%;">Zone</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($regions as $region)
                    <tr>
                        <td>{{ $region->region_code ?? '-' }}</td>
                        <td>{{ $region->region_name ?? '-' }}</td>
                        <td>{{ $region->zone[0] ? $region->zone[0]->longdescription : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
