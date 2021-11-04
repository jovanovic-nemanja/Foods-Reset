@extends('layouts.frontendTemplate')

@section('css-file')
    <link href="{{ asset('css/jquery.stickytable.min.css') }}?v={{time()}}" rel="stylesheet">
    <link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
@endsection
@section('content')
	<?php
	use App\Libraries\ZnUtilities;

	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	$DisEst = App\Models\DistributionEstriction::where( 'user_id', Auth::user()->id )->first();
	$setting = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$pools = App\Models\Pool::get();
	?>

    <body class="">
    <main role="main-wrapper">
        <section role="register-page" class="py-4">
            <div class="container">
                <div class="row">
                    <!--<div class="row">-->
                    <div class="col-sm-12">
                        <div class="row align-content-center">
                            <div class="col-sm-4 mb-4">
                                <h3><span style="color:#4F81BD;">{{Auth::user()->company_name}}</span></h3>
                                <h3><span style="color:#4F81BD;"> {{Auth::user()->address}} </span></h3>
                            </div>
                            <div class="col-sm-4 mb-4">
                                <a href="{{url('/')}}"><img style="width:230px;"
                                                            src="{{asset('img/logo-new.jpg')}}" alt=""/></a>
                            </div>
                            <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                                <div class="drop-menu ml-auto">
                                    <a href="javascript:void(0);"><img src="{{asset('img/profile-pic.png')}}"/>
                                        <span>{{Auth::user()->name}}<i class="fa fa-angle-down"></i></span></a>
                                    <ul>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i>
                                                My Public Profile</a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                      aria-hidden="true"></i>Posting
                                                History <span style="color:red;"> {{$notification_count}} </span> </a>
                                        </li>
                                        @if(Auth::user()->user_role == 2)
                                            <li><a href="{{url('/')}}/allallocation"><i class="fa fa-money"
                                                                                        aria-hidden="true"></i>All
                                                    Allocation </a></li>@endif
                                        <li><a href="{{url('/')}}/logout"><i class="fa fa-sign-out"
                                                                             aria-hidden="true"></i> Sign off</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="register-form-holder">
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Company Name:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->company_name}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Contact Name:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->name}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Contact Email:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->email}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Contact Number:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->mobile}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Address:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->address}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Delivery windows:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{Auth::user()->delivery_window}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Delivery Location:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->delivery_location}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Delivery Services:</h6>
                                </div>
                                <div class='col-md-6'>
									<?php $ser = explode( ',', Auth::user()->delivery_service ); ?>
                                    {{(in_array('Inside delivery',$ser))?'Inside delivery,"':''}}
                                    {{(in_array('Outside Delivery',$ser))?'Outside Delivery,':''}}
                                    {{(in_array('Call Before Delivery',$ser))?'Call Before Delivery,':''}}
                                    {{(in_array('Lift gate service at delivery',$ser))?'Lift gate service at delivery,':''}}
                                    {{(in_array('Elevated dock at delivery',$ser))?'Elevated dock at delivery,':''}}
                                    {{(in_array('Protect from freezing',$ser))?'Protect from freezing,':''}}
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h6>Description:</h6>
                                </div>
                                <div class='col-md-6'>
                                    {{$userInfo->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
@section('js-file')
    <script src="{{ asset('js/chosen.jquery.js') }}?v={{time()}}" type="text/javascript"></script>
    <script src="{{ asset('js/pekeUpload.js') }}?v={{time()}}"></script>
    <script src="{{ asset('js/supplier.js') }}?v={{time()}}"></script>
    <script src="{{ asset('js/jquery.stickytable.js') }}?v={{time()}}"></script>

    <script type="text/javascript">

        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "100% !important"}
        };
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }
    </script>
    <script>
        $(document).ready(function () {

            $.ajax({
                url: url + "/delete/warehouse/pool",
                type: "get",
                success: function (result) {

                }
            });
        });

        $(".product_location").on('change', function (e) {
            var sid = $(this).data('pl');
            alert(sid);
        });

        function productlocation(id, pid) {
            $.ajax({
                url: url + "/get/warehouse/pool/" + pid + "/" + id,
                type: "get",
                success: function (result) {
                    var data = $.parseJSON(result);
                    var pooll = data.pool;
                    var str_array = pooll.split(',');

                    for (var i = 0; i < str_array.length; i++) {
                        str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                    }
                    $(".spool-" + id).val(str_array).trigger("chosen:updated");
                }
            });

            $(".model1-" + id).attr("data-target", "#myModal_" + pid);
            $(".tt-" + pid).chosen({
                width: '200px'
            });
        }
    </script>
@endsection
@endsection
