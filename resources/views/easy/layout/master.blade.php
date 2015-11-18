<!DOCTYPE html>
<html>
    <head>
        <title>App Name - @yield('title')</title>
        @section('header')
            This is the master sidebar.
        @show
    </head>
    <body class="easyui-layout">
        @section('sidebar')
            
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            
            <p>This is my body content.</p>
        @show
    </body>
</html>