<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevex Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('css/user/add_user.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h5 class="text-white mb-4">Navigation</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="{{ route('zone') }}" class="nav-link text-white">Zone</a></li>
                <li class="nav-item mb-2"><a href="{{ route('region') }}" class="nav-link text-white">Region</a></li>
                <li class="nav-item mb-2"><a href="{{ route('territory') }}" class="nav-link text-white">Territory</a></li>
                <li class="nav-item mb-2"><a href="{{ route('users') }}" class="nav-link text-white">Users</a></li>
                <li class="nav-item mb-2"><a href="{{ route('product') }}" class="nav-link text-white">Product</a></li>
                <li class="nav-item mb-2"><a href="{{ route('purchase_order.create') }}" class="nav-link text-white">New Order</a></li>
                <li class="nav-item mb-2"><a href="{{ route('purchase_order.index') }}" class="nav-link text-white">Purchase Orders</a></li>
                <li class="nav-item mb-2"><a href="{{ route('freeIssue') }}" class="nav-link text-white">Free Issue</a></li>
                <li class="nav-item mb-2"><a href="{{ route('discount') }}" class="nav-link text-white">Discount</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="admin-header mb-3">
                <p>Welcome</p>
            </div>
            <div class="welcome mb-4 text-end">
                <p id="datetime"></p>
            </div>

            @yield('content')
        </div>
    </div>

    <style>
        .admin-header {
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }

        .welcome {
            font-size: 14px;
        }

        .nav-link:hover {
            background-color: #495057;
            border-radius: 4px;
        }
    </style>

    <script>
        document.getElementById("datetime").innerHTML = new Date().toLocaleString();
    </script>
</body>
</html>
