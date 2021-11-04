<!DOCTYPE html>
<html lang="en">
<head>
	@php $url = env( 'APP_URL', 'url' ); @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title) ? $title: 'Dashboard'}}</title>
    <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css')}}?v={{time()}}">
    <link rel="stylesheet" href="{{ asset('datetimpepicker/bootstrap-datetimepicker.css')}}?v={{time()}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('admin/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{ asset('admin/https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('css-file')
    @php  $url = env( 'APP_URL', 'url'); @endphp
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.navBar')
    @include('layouts.leftSideBar')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{isset($content_header)?$content_header:'Dashboard'}}
                <small> {{isset($content_header_1)?$content_header_1:'Control panel'}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
    <!--   @include('layouts.flashMessage')-->
        @yield('content')
    </div>
</div>

<script>
    var url = "{{$url}}";
</script>

<script src="{{ asset('admin/plugins/jQuery/jquery-3.1.1.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/plugins/morris/morris.min.js')}}"></script>
<script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ asset('admin/plugins/knob/jquery.knob.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('admin/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>
<script src="{{ asset('js/users.js')}}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.js')}}?v={{time()}}"></script>
<script src="{{ asset('datetimpepicker/bootstrap-datetimepicker.min.js')}}?v={{time()}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
@yield('js-file')

<script>
    $(document).ready(function () {
        $('.datetimepicker44').datetimepicker({
            format: 'YYYY-MM-DD hh:mm'
        });
        $('.datetimepicker444').datetimepicker({
            format: 'YYYY-MM-DD hh:mm'
        });

        $('.intnum').on('keyup keypress blur change', function (e) {
            var pr = $(this).val();
            pr = pr.replace(",", "");

            $(this).val(numberWithCommas(pr));
        });
    });
</script>
</body>
</html>