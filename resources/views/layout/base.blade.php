<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>App Name - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" type="text/css" />
    <script>

    </script>
</head>
<body>
<header>
<div class="container">
    <p class="text-center">this is header</p>
</div>
</header>


<div class="container">
    <div class="row">
        <div class="col-md-3">
           <nav>
               <ul class="nav">
                   @yield('sidebar')
               </ul>
           </nav>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>



<footer>
    <div class="container">
        this is footer
    </div>
</footer>
<script type="text/javascript" src="{{ asset('static/js/jquery.min.js') }}"></script>
@yield('other_js')
</body>
</html>