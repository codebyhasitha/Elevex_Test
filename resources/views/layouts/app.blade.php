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


<div class="container">
    <div class="admin-header">
        <p> Welcome</p>
    </div>

    <div class="welcome">
        <p></p>
        <p id="datetime"></p>
    </div>

    @yield('content')
</div>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

.admin-header {
    background-color: #343a40;
    color: white;
    padding: 10px;
    text-align: center;
    font-size: 18px;
}

.welcome {
    text-align: right;
    margin: 10px;
    font-size: 14px;
}

.form-container {
    width: 50%;
    margin: auto;
    padding: 20px;
    background: white;
    box-shadow: 0px 0px 10px 0px #ccc;
    border-radius: 8px;
    margin-top: 50px;
}

.form-label {
    font-weight: bold;
}

.btn-success {
    width: 100%;
    padding: 10px;
    font-size: 16px;
}

</style>
</html>
