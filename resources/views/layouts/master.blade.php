<!-- Stored in resources/views/layouts/master.blade.php -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        <!-- Custom Fonts of register form-->
        <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <!-- custom list student  -->
        <link rel="stylesheet"  href="{{URL::asset('css/custom.css')}}" crossorigin="anonymous">
        <!--        <!-- style list student and add student form -->
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" crossorigin="anonymous">

        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::asset('font-awesome/css/font-awsome.css')}}">
        <script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.js')}}"></script>


    </head>
    <body style="background:#DFDFDF;">

        <div class="container">
              @yield('content')
        </div>

    </body>
</html>
