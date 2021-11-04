<?php $url = env( 'APP_URL', 'url' );
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ResetFoods</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/mainNavBar.css')}}?v={{time()}}">
    <link rel="stylesheet" href="{{ asset('css/front.css')}}?v={{time()}}">
    @yield('css-file')
</head>
<body>
<div class="wrapper">
    @include('layouts.mainNavBar')
    @yield('content')
</div>
    @include('layouts.mainFooter')
</body>

{{-- <script src="{{asset('js/jquery.min.js')}}?v={{time()}}"></script>
<script src="{{asset('js/bootstrap.js')}}?v={{time()}}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/front.js')}}?v={{time()}}"></script>
@yield('js-file')

</html>
