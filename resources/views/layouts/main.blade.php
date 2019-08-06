<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <title>JasonBlog</title>
    @yield('style')
</head>

<body>
    @if(session('user'))
        @include('layouts.headerin')
    @else 
        @include('layouts.headerout')
    @endif
        <div class="container" style="margin-top:80px">
            @yield('content')
        </div>
    
    @include('layouts.footer')
    
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('script')
</body>

