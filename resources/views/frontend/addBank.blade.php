@extends('layouts.frontendTemplate')

@section('css-file')
    <link href="http://oscuz.com/mplace/assets/frontend/css/choosen.css" rel="stylesheet">
    <style>
        table thead tr {
            display: block;
        }

        table th, table td {
            width: 100px;
        / / fixed width
        }

        table tbody {
            display: block;

            overflow: auto;
        / / set tbody to auto
        }
    </style>
@endsection

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	$DisEst = App\Models\DistributionEstriction::where( 'user_id', Auth::user()->id )->first();

	$setting = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$pools = explode( ',', $setting->pool );

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
                                <a href="{{url('/')}}">
                                    <img style="width:230px;" src="{{asset('img/logo-new.jpg')}}" alt=""/></a>
                            </div>
                            <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                                <div class="drop-menu ml-auto">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('img/profile-pic.png')}}"/>
                                        <span>{{Auth::user()->name}}<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i>
                                                My Public Profile</a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                      aria-hidden="true"></i>Notifications
                                                <span style="color:red;"> {{$notification_count}} </span> </a></li>
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
                    <div class="col-md-6">
                        <div class="row mt-4">
                            <br>
                            <form action="{{url('/')}}/addbank/detail/{{$supplier_post_id}}/{{$allocation_id}}"
                                  method='post' class='form-control'>
                                {{ csrf_field() }}
                                <div class="col-lg-12 mb-3">
                                    <label>Add Bank Details</label><br>
                                    <textarea rows='6' name='addbank' class='form-control'></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-blue btn-block">POST</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
@section('js-file')
    <script src="{{ asset('js/1_supplier.js') }}?v={{time()}}"></script>
    <script src="{{ asset('js/pekeUpload.js') }}?v={{time()}}"></script>
@endsection
@endsection
