<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/toastr/css/toastr.min.css')}}">

    <script src="{{asset('vendor/jQuery/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('vendor/toastr/js/toastr.min.js')}}"></script>

    <title>@yield('title', 'ร้านขายหนังสือ ม.เนินหอม')</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">ร้านขายหนังสือ</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i> หน้าแรก</a> </li>
                    <li> <a href="{{ url('/customers/') }}"><i class="fa fa-users"></i> ลูกค้า</a> </li>
                    <li> <a href="{{ url('/books/') }}"><i class="fa fa-book"></i> หนังสือ</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
        @if (session('msg'))
            @if (session('ok'))
                <script> toastr.success("{{ session('msg') }}") </script>
            @else
                <script> toastr.error("{{ session('msg') }}") </script>
            @endif
        @endif
    </div>

    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>