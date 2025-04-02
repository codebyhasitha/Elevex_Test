@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4">VIEW TERRITORIES</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 20%;">Territory Code</th>
                        <th scope="col" style="width: 30%;">Territory Name</th>
                        <th scope="col" style="width: 25%;">Region</th>
                        <th scope="col" style="width: 25%;">Zone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($territories as $territory)
                    <tr>
                        <td>{{ $territory->territory_code ?? '-' }}</td>
                        <td>{{ $territory->territory_name ?? '-' }}</td>
                        <td>{{ $territory->region->region_name ?? '-' }}</td>
                        <td>{{ $territory->zone? $territory->zone->longdescription : '-' }}</td>
                        {{-- <td>{{ $user->territory[0]->region[0]->zone[0]->longdescription ?? '-' }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
