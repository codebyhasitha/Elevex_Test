<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Zone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="{{ asset('css/add_zone.css') }}" rel="stylesheet">

</head>
<body onload="updateDateTime()">
    <div class="admin-header">
        <p>ADMIN LOGIN</p>
        <p>1. ZONE REGISTRATION / VIEW & EDIT</p>
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

    <div class="form-container" >
        <h2 class="mb-4">ADD ZONE</h2>
        <form action="{{route('zone.store')}}" method='POST'>
            @csrf
                <div class="mb-3 text-start">
                    <label for="examplezone" class="form-label">Zone Code</label>
                    <input type="text" class="form-control" name="zonecode" id="zonecode" placeholder="Automatically" readonly>
                </div>
                <div class="mb-3 text-start">
                    <label for="zonelongdescription" class="form-label">Zone Long Description</label>
                    <input type="text" class="form-control" name="longdescription" id="longdescription" placeholder="Ex. ZONE 1">
                </div>
                <div class="mb-3 text-start">
                    <label for="zoneshortdescription" class="form-label">Short Description</label>
                    <input type="text" class="form-control" name="shortdescription" id="shortdescription" placeholder="Ex. Z01">
                </div>
                <button type="submit" class="btn btn-success">SAVE</button>
        </form>
    </div>
    <script src="{{ asset('js/add_zone.js') }}"></script>
</body>
</html>
