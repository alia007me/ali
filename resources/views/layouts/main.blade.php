<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('script/jquery-3.3.1.js') }}"></script>
    <script src="{{asset('script/bootstrap.js')}}"></script>
    <title>Contact</title>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center flex-column">
    <h1 class="text-center text-dark mb-5 mt-5">Contacts</h1>
    <div class="clearfix"></div>
    @yield('main')
</div>
</body>
</html>
