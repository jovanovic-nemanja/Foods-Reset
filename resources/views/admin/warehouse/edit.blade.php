@extends('layouts.master')

@section('content')

@section('css-file')
    <link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
    <style>
        .chosen-search-input {
            width: 200px !important;
        }
    </style>
@endsection
<!-- Main content -->
<section class="content">
    <div class="row">
        <form role="form" action="{{url('/')}}/warehouse/{{$warehouse->id}}" name='user_form' id='user_form'
              method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <input type="hidden" class="form-control lat" value="{{$warehouse->lat}}" required name="lat"
                   placeholder="Enter Latitude "/>
            <input type="hidden" class="form-control lng" value="{{$warehouse->lng}}" required name="lng"
                   placeholder="Enter Longitude "/>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit WareHouse</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Company Name</label>
                                    <input type="text" class="form-control" value="{{$warehouse->company_name}}"
                                           required name="company_name" placeholder="Company Name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Contact Name</label>
                                    <input type="text" class="form-control" value="{{$warehouse->name}}" required
                                           name="username" placeholder="Contact Name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Street Address</label>
                                    <input type="text" class="form-control raddress s1" value="{{$warehouse->street}}"
                                           required name="street" placeholder=""/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">City</label>
                                    <input type="text" class="form-control raddress s2" value="{{$warehouse->city}}"
                                           name="city" placeholder=""/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">State</label>
                                    <input type="text" class="form-control raddress s5" value="{{$warehouse->state}}"
                                           name="state" placeholder=""/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Zipcode</label>
                                    <input type="text" class="form-control raddress s3" value="{{$warehouse->zipcode}}"
                                           name="zipcode" placeholder=""/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Country</label>
                                    <input type="text" class="form-control raddress s4" value="{{$warehouse->country}}"
                                           name="country" placeholder=""/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Pool</label>
                                    <select id="instantbookingjt" data-placeholder="Select one"
                                            class="input form-input chosen-select form-control" name='pool_id[]'
                                            multiple>
                                        <option value="">Please Select</option>
										<?php $ser1 = explode( ',', $warehouse->pool ); ?>
                                        @foreach($pool as $c)
                                            <option {{(in_array($c->id,$ser1))?'selected="selected"':''}} value="{{$c->id}}">{{$c->pool_name}} @if($c->distance > 0)
                                                    [{{$c->distance}} KM] @endif </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Email</label>
                                    <input type="text" class="form-control email" name="email" readonly required
                                           value="{{$warehouse->email}}" placeholder="Contact email [Confirm]"/>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="InputTitle">Notification Email</label>
                                    <input type="text" class="form-control email" name="notification"
                                           value="{{$warehouse->noti_email}}" placeholder=""/>
                                    @if ($errors->has('notification'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('notification') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="" name="password"
                                           placeholder="Password"/>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-8">
                                <div class="logistics">
                                    <h3>Logistics</h3>
                                    <table class="table" style="margin:0px; background:none;">
                                        <tr>
                                            <td>Geographic boundaries:</td>
                                            <td>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" name="geo_boundary"
                                                           @if($warehouse->geo_boundary == 100) checked
                                                           @endif type="radio" class="custom-control-input" value="100">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">100km</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" name="geo_boundary"
                                                           @if($warehouse->geo_boundary == 150) checked
                                                           @endif type="radio" class="custom-control-input" value="150">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">150km</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" name="geo_boundary"
                                                           @if($warehouse->geo_boundary == 200) checked
                                                           @endif type="radio" class="custom-control-input" value="200">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">200km</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Delivery windows</td>
                                            <td>
                                                <input id="" required type="text"
                                                       value="{{$warehouse->delivery_window}}" class="datetimepicker44"
                                                       name="delivery_window">
                                                -
                                                <input id="" required type="text"
                                                       value="{{$warehouse->delivery_window_to}}"
                                                       class="datetimepicker444" name="delivery_window_to">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Location</td>
                                            <td><input type="text" name="delivery_location"
                                                       class="form-control rdelivery_location"
                                                       value="{{$warehouse->delivery_location}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Services</td>
                                            <td>
												<?php $ser = explode( ',', $warehouse->delivery_service ); ?>
                                                <select id="instantbookingjt" data-placeholder="Select one"
                                                        class="input form-input chosen-select form-control"
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
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"
                                              placeholder="Enter text here ">{{$warehouse->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-8">
                                <div class="logistics">
                                    <h3>Banking Details</h3>
                                    <table class="table" style="margin:0px; background:none;">
                                        <tr>
                                            <td>Bank:</td>
                                            <td><input type="text" name="bank" class="form-control"
                                                       value="{{$warehouse->bank}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Branch:</td>
                                            <td><input type="text" name="branch" class="form-control"
                                                       value="{{$warehouse->branch}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Transit:</td>
                                            <td><input type="text" name="transit" class="form-control"
                                                       value="{{$warehouse->transit}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Account Number:</td>
                                            <td><input type="text" name="account_number" class="form-control"
                                                       value="{{$warehouse->account_number}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Details:</td>
                                            <td><input type="text" name="details" class="form-control"
                                                       value="{{$warehouse->details}}"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
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
//innerHTML
//    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address="+address+"&sensor=false&region=$region");
//    $json = json_decode($json);
//
//    console.log($json);
//

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

//    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
//    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
//    return $lat.','.$long;
        }

    </script>


@endsection
@endsection
