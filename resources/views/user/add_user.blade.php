<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/user/add_user.css') }}" rel="stylesheet">
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="form-container">
        <h2 class="text-center">ADD USERS</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="nic" class="form-label">NIC<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nic" id="nic" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="mobile" id="mobile" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            @php
            //dd($territory);
            @endphp
            <div class="mb-3">
                <label for="territory" class="form-label">Territory<span class="text-danger">*</span></label>
                <select class="form-control" name="territory_id" id="territory" required>
                    <option value="">Select</option>

                    @foreach($territory as $ter)
                        <option value="{{ $ter->id }}">{{ $ter->territory_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">SAVE</button>
        </form>
    </div>

    <script src="{{ asset('js/user/add_user.js') }}"></script>
</body>
</html>
