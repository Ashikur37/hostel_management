<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>