<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <title>JasonBlog</title>
    @yield('style')
</head>

<body>
<div>
    @if(session('user'))
        @include('layouts.headerin')
    @else 
        @include('layouts.headerout')
    @endif
    <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top: 10px">
        @yield('content')
    </div>
    
    @include('layouts.footer')
    
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('script')



</div>

</body>

