<?php $url = env( 'APP_URL', 'url' );
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ResetFoods</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}?v={{time()}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}?v={{time()}}"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}?v={{time()}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet"
          href="{{asset('css/bootstrap_datepicker.css')}}?v={{ Cache::get('js_version_number')}}">
    <link rel="stylesheet" href="{{asset('css/fastselect.min.css')}}?v={{time()}}">
    <link rel="stylesheet" href="{{asset('css/jquery.simple-dtpicker.css')}}?v={{time()}}">
    <link rel="stylesheet" href="{{asset('css/jquery.datetimepicker.css')}}?v={{time()}}">
    @yield('css-file')
</head>

@include('layouts.flashMessage')
@yield('content')
<script src="{{asset('js/jquery.min.js')}}?v={{time()}}"></script>
<script src="{{asset('js/theter.min.js')}}?v={{time()}}"></script>
<script src="{{asset('js/bootstrap.js')}}?v={{time()}}"></script>
<script src="{{asset('js/bootstrap-tagsinput.js')}}?v={{time()}}"></script>
<script src="{{asset('js/bootstrap-tagsinput.min.js')}}?v={{time()}}"></script>
<script src="{{ asset('js/fastselect.standalone.js') }}?v={{time()}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="{{asset('js/jquery.datetimepicker.js')}}"></script>
<script>
    var url = "{{url('/')}}";
    $(document).ready(function () {
        $(".email_notification").change(function () {
            var eid = $(this).val();
            if (eid > 0) {
                $(".noti_email").show();
            }
            else {
                $(".noti_email").hide();
            }
        });
        $(".text_notification").change(function () {
            var mid = $(this).val();
            if (mid > 0) {
                $(".mobile").show();
            }
            else {
                $(".mobile").hide();
            }
        });
    });
    $('.email').on('keyup keypress blur change', function (e) {
        $(".noti_email").val($(this).val());
    });

    $('.raddress1').on('keyup keypress blur change', function (e) {
        $(".rdelivery_location").val($(this).val());
    });

    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'Y-m-d h:i',
            formatDate: 'Y-m-d h:i',
            timepicker: false
        });

        $('.datetimepicker44').datetimepicker({
            format: 'Y-m-d h:i',
            formatDate: 'Y-m-d h:i',
            timepicker: true
        });

        $('.datetimepicker444').datetimepicker({
            format: 'Y-m-d h:i',
            formatDate: 'Y-m-d h:i',
            timepicker: true
        });
    })
</script>
@yield('js-file')

</html>
