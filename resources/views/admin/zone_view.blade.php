    @extends('layouts.app')

    @section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow p-4 w-100" style="max-width: 1200px;">
            <h2 class="text-center mb-4">VIEW ZONES</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 20%;">Zone Code</th>
                            <th scope="col" style="width: 40%;">Zone Long Description</th>
                            <th scope="col" style="width: 20%;">Short Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zones as $zone)
                        <tr>
                            <td>{{ $zone->zonecode ?? '-' }}</td>
                            <td>{{ $zone->longdescription ?? '-' }}</td>
                            <td>{{ $zone->shortdescription ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
