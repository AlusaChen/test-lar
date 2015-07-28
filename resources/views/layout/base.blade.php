<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>App Name - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" type="text/css" />
    <script>

    </script>
</head>
<body>
<header>
<div class="container">
    this is header
</div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-3">
           <nav>
               <ul class="nav">
                   @section('sidebar')
                   <li>
                       This is the master sidebar.
                   </li>
                   @show
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
</body>
</html>