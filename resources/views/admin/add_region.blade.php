<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Region</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="{{ asset('css/add_region.css') }}" rel="stylesheet">
</head>
<body onload="updateDateTime()">
    <div class="admin-header">
        <p>ADMIN LOGIN</p>
        <p>2. REGION REGISTRATION / VIEW & EDIT</p>
    </div>

    <div class="welcome">
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
        <h2 class="mb-4">ADD REGION</h2>
        <form action="{{route('region.store')}}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="zone" class="form-label">Zone</label>
                <select class="form-control" name="zone" id="zone">
                    <option value="">Select</option>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->longdescription }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 text-start">
                <label for="regioncode" class="form-label">Region Code</label>
                <input type="text" class="form-control" name="regioncode" id="regioncode" placeholder="Automatically" readonly>
            </div>
            <div class="mb-3 text-start">
                <label for="regionname" class="form-label">Region Name</label>
                <input type="text" class="form-control" name="regionname" id="regionname" placeholder="Ex. REGION 1">
            </div>
            <button type="submit" class="btn btn-success">SAVE</button>
        </form>
    </div>

    <script src="{{ asset('js/add_region.js') }}"></script>
</body>
</html>
