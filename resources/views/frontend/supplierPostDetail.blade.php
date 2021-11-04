@extends('layouts.frontendTemplate')

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	$DisEst = App\Models\DistributionEstriction::where( 'user_id', Auth::user()->id )->first();
	?>
    <body class="">
    <main role="main-wrapper">
        <section role="register-page" class="py-4">
            <div class="container">
                <div class="row">
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
                        <div class="row mt-4">
                            <br>
                            <form action="{{url('/supplier/post')}}" method='post' class='form-control'>
                                {{ csrf_field() }}
                                <h6>POST: Supplier Post Detail</h6>
                                <div class="col-lg-12 mb-3">
                                    <select class="custom-select form-control" name='supplier_type'>
                                        <option value='Wholesaler'>Wholesaler</option>
                                        <option value='Farm'>Farm</option>
                                        <option value='Liquidator'>Liquidator</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Supplier Type</label>
                                    <p>{{$supplier_post->supplier_type}}</p>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Category</label>
                                    <select class="custom-select form-control supplier_category" name='category_id'>
                                        <option value=''>Please Select</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Products</label>
                                    <select class="custom-select form-control supplier_products" required
                                            name='product_id'>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3" id="other_product_div" style="display: none;">
                                    <label>Other Product</label>
                                    <input type="text" class="form-control" name='other_product' value="">
                                </div>
                                <div class="col-lg-12 mb-3" id="search-keyword2">
                                    <label>Search Keywords</label>
                                    <select multiple class="form-control multipleSelect" name='keywords[]'>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Expiry</label>
                                    <select class="custom-select form-control" name='maximum_days_remaining'>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" required name='quantity' value="">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Price</label>
                                    <input type="text" class="form-control" required name='price' value="">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Description</label><br>
                                    <textarea name='description' class='form-control'></textarea>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Rating</label>
                                    <select class="custom-select" name='rating'>
                                        <option value='1'>1 Star</option>
                                        <option value='2'>2 Star</option>
                                        <option value='3'>3 Star</option>
                                        <option value='4'>4 Star</option>
                                        <option value='5'>5 Star</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label>Distribution Restrictions</label></br>
                                    <label class="custom-control custom-radio">
                                        <input id="radio11" name="dis_res" type="radio" value='0' checked
                                               class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">On</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio11" name="dis_res" type="radio" value='1'
                                               class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Off</span>
                                    </label>
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
    <script src="http://oscuz.com/mplace//assets/js/chosen.jquery.js" type="text/javascript"></script>
@endsection

@endsection
