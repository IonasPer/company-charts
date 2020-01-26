<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Cruising Supplies Co.') }}</title>

    {{--<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Custom fonts for this template-->
    {{--<link href="{{\Illuminate\Support\Facades\URL::to("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Page level plugin CSS-->
    {{--<link href="{{\Illuminate\Support\Facades\URL::to("vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">--}}
    <link href="{{\Illuminate\Support\Facades\URL::to("css/custom.css")}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{\Illuminate\Support\Facades\URL::to("css/sb-admin.css")}}" rel="stylesheet">
@yield('styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::to("css/jquery-ui.css")}}">
    <script src="{{\Illuminate\Support\Facades\URL::to("js/jquery-1.12.4.js")}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::to("js/jquery-ui.js")}}"></script>


    <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.js"></script>
    <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>

</head>
<body id="page-top" class="sidebar-toggled">
{{--@include('includes.header')--}}
@include('includes.navbar')
<div id="wrapper">
    <!-- Sidebar -->
    {{--@include('includes.sidebar')--}}
    @include('includes.scripts')
    @auth
    <div id="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    @endauth
    @guest
        @php $dashboard_img = 'login_background.png' @endphp
        <div id="content-wrapper" style=" background-image: url(/img/{{$dashboard_img}});background-repeat:repeat">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
    @endguest
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
@include('includes.scroll_top')
@include('includes.logout')

@yield('scripts')
</body>
</html>
