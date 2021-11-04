<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{'Admin Dashboard | RESETFOODS'}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- inject:css-->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/fullcalendar@5.2.0.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/jquery-jvectormap-2.0.5.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/MarkerCluster.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/MarkerCluster.Default.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/star-rating-svg.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/trumbowyg.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/wickedpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/admin/assets/vendor_assets/css/custom-style.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
        .card-stretch {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: stretch !important;
            -ms-flex-align: stretch !important;
            align-items: stretch !important;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            height: 100%;
        }

        span.url {
            max-width: 100%;
            display: block;
            word-wrap: break-word;
        }

    </style>
</head>
<body class="layout-light side-menu">

<div id="app">
    <app-body :user="{{auth()->user()}}"></app-body>
</div>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
<!-- inject:js-->
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery/jquery-ui.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/accordion.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/autoComplete.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/Chart.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/charts.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/moment.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/daterangepicker.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/drawer.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/dynamicBadge.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/dynamicCheckbox.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/feather.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/fullcalendar@5.2.0.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/google-chart.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery.countdown.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery.filterizr.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery.mCustomScrollbar.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery.peity.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/jquery.star-rating-svg.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/leaflet.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/leaflet.markercluster.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/loader.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/message.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/muuri.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/notification.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/popover.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/select2.full.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/slick.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/trumbowyg.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/vendor_assets/js/wickedpicker.min.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/drag-drop.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/full-calendar.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/googlemap-init.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/icon-loader.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/jvectormap-init.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/leaflet-init.js")}}"></script>
<script src="{{asset("backend/admin/assets/theme_assets/js/main.js")}}"></script>
<!-- endinject-->
</body>

</html>
