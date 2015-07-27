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
<div class="container">

    @section('sidebar')
        This is the master sidebar.
    @show

    
    @yield('content')
</div>
</body>
</html>