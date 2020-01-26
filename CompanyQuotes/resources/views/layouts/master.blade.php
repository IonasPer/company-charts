<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{\Illuminate\Support\Facades\URL::to("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Page level plugin CSS-->
    <link href="{{\Illuminate\Support\Facades\URL::to("vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{\Illuminate\Support\Facades\URL::to("css/sb-admin.css")}}" rel="stylesheet">
    @yield('styles')
</head>
<body id="page-top">
{{--@include('includes.header')--}}{{--
@include('includes.navbar')--}}
<div id="wrapper">
   {{-- <!-- Sidebar -->
    @include('includes.sidebar')--}}
    <div id="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
@include('includes.scroll_top')
{{--@include('includes.logout')--}}
@include('includes.scripts')
@yield('scripts')
</body>
</html>


