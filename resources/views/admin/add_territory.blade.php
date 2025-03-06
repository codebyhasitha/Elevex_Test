<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Territory</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/add_territory.css') }}" rel="stylesheet">
</head>
<body onload="updateDateTime()">

    <div class="admin-header">
        <p>Welcome System Admin</p>
        <p id="datetime"></p>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="form-container">
        <h2 class="mb-4">ADD TERRITORY</h2>
        <form action="{{ route('territory.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="zone" class="form-label">Zone</label>
                <select class="form-control" name="zone_id" id="zone">
                    <option value="">Select</option>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->longdescription }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                    <label for="region" class="form-label">Region</label>
                    <select class="form-control" name="region_id" id="region">
                        <option value="">Select</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="mb-3">
                <label for="territory_code" class="form-label">Territory Code</label>
                <input type="text" class="form-control" name="territory_code" id="territory_code" placeholder="Automatically" readonly>
            </div>

            <div class="mb-3">
                <label for="territory_name" class="form-label">Territory Name</label>
                <input type="text" class="form-control" name="territory_name" id="territory_name" placeholder="Ex. TERRITORY 1">
            </div>

            <button type="submit" class="btn btn-success">SAVE</button>
        </form>
    </div>
    <script src="{{ asset('js/add_territory.js') }}"></script>
</body>
</html>
