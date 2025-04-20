@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">GPS Locations</h2>

    {{-- Filter by Sales Rep --}}
    <form method="GET" action="{{ route('gps_locations.index') }}" class="row g-3 align-items-end">
        <div class="col-md-6">
            <label for="user_id" class="form-label">Select Sales Rep</label>
            <select name="user_id" id="user_id" class="form-select" onchange="this.form.submit()">
                <option value="">-- All Sales Reps --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->role ?? 'Rep' }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Filter by Date --}}
        <div class="col-md-4">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date', date('Y-m-d')) }}">
        </div>
        <div class="col-md-4">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date', date('Y-m-d')) }}">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>



    {{-- Map Initialization --}}
    <div id="map" style="height: 500px;" class="mt-4"></div>

    {{-- Table of GPS Records --}}
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Sales Rep</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Mileage (km)</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locations as $location)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $location->user->name ?? 'N/A' }}</td>
                        <td>{{ $location->latitude }}</td>
                        <td>{{ $location->longitude }}</td>
                        <td>{{ $location->mileage }}</td>
                        <td>{{ $location->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No GPS data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQwie85LVok2zZ4YD5WDI8bkb2ipFtEb4"></script>
<script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: { lat: 6.927079, lng: 79.861244 }, // Initial center (Colombo)
        });

        const repId = '{{ request("user_id") }}';
        const today = new Date().toISOString().split("T")[0];

        if (!repId) return;

        fetch(`/gps-path?user_id=${repId}&date=${today}`)
            .then(response => response.json())
            .then(data => {
                if (!data.length) {
                    alert("No location data for this rep.");
                    return;
                }

                const pathCoords = [];
                data.forEach(loc => {
                    const point = { lat: parseFloat(loc.latitude), lng: parseFloat(loc.longitude) };
                    pathCoords.push(point);
                    new google.maps.Marker({
                        position: point,
                        map: map,
                        title: loc.created_at
                    });
                });

                const pathLine = new google.maps.Polyline({
                    path: pathCoords,
                    geodesic: true,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                });

                pathLine.setMap(map);
                map.setCenter(pathCoords[0]); // Center the map on the first point
            })
            .catch(err => console.error("Error fetching GPS data", err));
    }

    window.onload = initMap;
</script>
