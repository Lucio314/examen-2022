<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <style>
        body {

            font-family: Arial, Helvetica, sans-serif;
            font-size: 12;
            background-color: #ECF0F5
        }
    </style>
</head>

<body>
    @yield('content')
    <script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>

</html>