@extends('layouts.frontendTemplate')

@section('content')
@section('css-file')
    <link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
@endsection
<style>
    #instantbookingjt_chosen {
        width: 100% !important;
    }

    .chosen-container-multi .chosen-choices {
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
    }
</style>
<?php

use App\Libraries\ZnUtilities;

$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
$DisEst = App\Models\DistributionEstriction::where( 'user_id', Auth::user()->id )->first();

$setting = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
$pools = App\Models\Pool::get();
$preference = App\Models\Pool::where( 'pool_type', '1' )->get();
?>

<body class="" style=""> <!--onload="initialize()"-->
<main role="main-wrapper">
    <section role="register-page" class="py-5">
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
                                <img style="width:230px;" src="{{asset('img/logo-new.jpg')}}" alt=""/>
                            </a>
                        </div>
                        <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                            <div class="drop-menu ml-auto">
                                <a href="javascript:void(0);">
                                    <img src="{{asset('img/profile-pic.png')}}"/>
                                    <span>{{Auth::user()->name}}<i class="fa fa-angle-down"></i></span></a>
                                <ul>
                                    <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i> My
                                            Public Profile</a></li>
                                    <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My Home</a>
                                    </li>
                                    @if(Auth::user()->user_role == 3)
                                        <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                      aria-hidden="true"></i>Posting
                                                History <span style="color:red;"> {{$notification_count}} </span> </a>
                                        </li>@endif
                                    <li><a href="{{url('/')}}/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Sign off</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="register-form-holder">
                        <form class="custom" role="form" method="POST" action="{{ url('/profile/update') }}">
                            {{ csrf_field() }}
                            @if(Auth::user()->user_role != 2)
                                <input type="hidden" class="form-control lat" value="" name="preference[]"/>
                            @endif
                            <input type="hidden" class="form-control lat" value="{{Auth::user()->lat}}" required
                                   name="lat" placeholder="Enter Latitude "/>
                            <input type="hidden" class="form-control lng" value="{{Auth::user()->lng}}" required
                                   name="lng" placeholder="Enter Longitude "/>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Buyer/Supplier</label>
                                <select class="custom-select form-control" name="user_role" readonly>
                                    <option {{Auth::user()->user_role == 2 ?'selected="selected"':''}} value="2">Buyer
                                    </option>
                                    <option {{Auth::user()->user_role == 3 ?'selected="selected"':''}} value="3">
                                        Supplier
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->company_name}}" required
                                       name="company_name" placeholder="Company Name"/>
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Contact Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" required
                                       name="name" placeholder="Contact Name"/>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Street Address </label>
                                <input type="text" class="form-control raddress s1" value="{{Auth::user()->street}}"
                                       required name="street" placeholder="Enter Street Address "/>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>City </label>
                                <input type="text" class="form-control raddress s2" value="{{Auth::user()->city}}"
                                       name="city" placeholder="Enter City"/>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>State </label>
                                <input type="text" class="form-control raddress s5" value="{{Auth::user()->state}}"
                                       name="state" placeholder="Enter State "/>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Zip Code </label>
                                <input type="text" class="form-control raddress s3" value="{{Auth::user()->zipcode}}"
                                       name="zipcode" placeholder="Enter Zipcode "/>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control raddress s4" value="{{Auth::user()->country}}"
                                       name="country" placeholder="Enter Country "/>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Contact email</label>
                                <input type="text" class="form-control email" name="email" required
                                       value="{{Auth::user()->email}}" readonly placeholder="Contact email [Confirm]"/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row mt-4 mb-4">
                                <div class="col-sm-12">
                                    <div class="logistics">
                                        <h6>Logistics</h6>
                                        <table class="table" style="margin:0px; background:none;">
                                            <tr>
                                                <td>Geographic boundaries:</td>

                                                <td>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="geo_boundary"
                                                               @if(Auth::user()->geo_boundary == 100) checked
                                                               @endif type="radio" class="custom-control-input"
                                                               value="100">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">100km</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="geo_boundary"
                                                               @if(Auth::user()->geo_boundary == 150) checked
                                                               @endif type="radio" class="custom-control-input"
                                                               value="150">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">150km</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="geo_boundary"
                                                               @if(Auth::user()->geo_boundary == 200) checked
                                                               @endif type="radio" class="custom-control-input"
                                                               value="200">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">200km</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pickup</td>
                                                <td>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="pikup"
                                                               @if(Auth::user()->user_role == 2) checked
                                                               @endif type="radio" class="custom-control-input"
                                                               value="Buyer pickup">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Buyer pickup</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="pikup"
                                                               @if(Auth::user()->user_role == 3) checked
                                                               @endif type="radio" class="custom-control-input"
                                                               value="Supplier delivery Preference">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Supplier delivery Preference</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Delivery windows</td>
                                                <td>
													<?php   ?>

                                                    <input id="" required type="text" style="width: 30%;"
                                                           value="{{Auth::user()->delivery_window}}"
                                                           class="datetimepicker44" name="delivery_window">
                                                    - <input id="" required type="text" style="width: 30%;"
                                                             value="{{Auth::user()->delivery_window_to}}"
                                                             class="datetimepicker44" name="delivery_window_to">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Location</td>
                                                <td><input type="text" name="delivery_location"
                                                           class="form-control rdelivery_location"
                                                           value="{{Auth::user()->delivery_location}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Services</td>
                                                <td>
													<?php $ser = explode(',', Auth::user()->delivery_service); ?>
                                                    <select id="instantbookingjt" data-placeholder="Select one"
                                                            class="input form-input chosen-select"
                                                            name="delivery_service[]" multiple>
                                                        <option {{(in_array('Inside delivery',$ser))?'selected="selected"':''}} value="Inside delivery">
                                                            Inside delivery
                                                        </option>
                                                        <option {{(in_array('Outside Delivery',$ser))?'selected="selected"':''}} value="Outside Delivery">
                                                            Outside Delivery
                                                        </option>
                                                        <option {{(in_array('Call Before Delivery',$ser))?'selected="selected"':''}} value="Call Before Delivery">
                                                            Call before delivery
                                                        </option>
                                                        <option {{(in_array('Lift gate service at delivery',$ser))?'selected="selected"':''}} value="Lift gate service at delivery">
                                                            Lift gate service at delivery
                                                        </option>
                                                        <option {{(in_array('Elevated dock at delivery',$ser))?'selected="selected"':''}} value="Elevated dock at delivery">
                                                            Elevated dock at delivery
                                                        </option>
                                                        <option {{(in_array('Protect from freezing',$ser))?'selected="selected"':''}} value="Protect from freezing">
                                                            Protect from freezing
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                @if(Auth::user()->user_role == 2)
                                                    <td>Buyer Preference</td>
                                                    <td>
														<?php $ser1 = explode(',', Auth::user()->pool); ?>
                                                        <select id="instantbookingjt" data-placeholder="Select one"
                                                                class="input form-input chosen-select"
                                                                name="preference[]" multiple>
                                                            @foreach($preference as $p)
                                                                <option {{(in_array($p->id,$ser1))?'selected="selected"':''}} value="{{$p->id}}">{{$p->pool_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td>
                                                    <textarea class="form-control" name="description"
                                                              placeholder="Enter text here ">{{Auth::user()->description}}</textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col-sm-12">
                                    <div class="logistics">
                                        <h6>Banking Details</h6>
                                        <table class="table" style="margin:0px; background:none;">
                                            <tr>
                                                <td>Bank:</td>
                                                <td><input type="text" name="bank" class="form-control"
                                                           value="{{Auth::user()->bank}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Branch:</td>
                                                <td><input type="text" name="branch" class="form-control"
                                                           value="{{Auth::user()->branch}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Transit:</td>
                                                <td><input type="text" name="transit" class="form-control"
                                                           value="{{Auth::user()->transit}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Account Number:</td>
                                                <td><input type="text" name="account_number" class="form-control"
                                                           value="{{Auth::user()->account_number}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Details:</td>
                                                <td><input type="text" name="details" class="form-control"
                                                           value="{{Auth::user()->details}}"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-blue btn-block">Update</button>
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
    <script src="{{ asset('js/chosen.jquery.js') }}?v={{time()}}" type="text/javascript"></script>
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
            $('.raddress').blur(function () {
                var s1 = $(".s1").val();
                var s2 = $(".s2").val();
                var s3 = $(".s3").val();
                var s4 = $(".s4").val();
                var s5 = $(".s5").val();
                var address = '';

                if (s1 != '') {
                    address = s1;
                }
                if (s2 != '') {
                    address = address + ' ' + s2;
                }
                if (s5 != '') {
                    address = address + ' ' + s5;
                }
                if (s3 != '') {
                    address = address + ' ' + s3;
                }
                if (s4 != '') {
                    address = address + ' ' + s4;
                }

                get_lat_long(address);
            });
        });

        function get_lat_long(address) {
            address = address.replace(" ", "+");
            $.ajax({
                url: "http://maps.google.com/maps/api/geocode/json?address=" + address + "&sensor=false&region=$region",
                type: "get",
                success: function (result) {
                    var lat = result.results[0].geometry.location.lat;
                    var lng = result.results[0].geometry.location.lng;
                    $(".lat").val(lat);
                    $(".lng").val(lng);
                }
            });
        }
    </script>
@endsection
@endsection
