@extends('layouts.frontendLayout')

@section('css-file')
    <link rel="stylesheet" href="{{asset('raw/css/multiStep_reg.css')}}">
    <link rel="stylesheet" href="{{asset('raw/css/custom.css')}}">
@endsection

@section('content')
    <div class="container">
        <!-- MultiStep Form -->
        <div class="col-12">
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="setp_1"></li>
                                <li id="setp_2"></li>
                                <li id="setp_3"></li>
                            </ul>
                            <!------------------------------------ step 01 start----------------------------------------------- -->
                            @php
                                $preference = App\Models\Pool::where('pool_type','1')->get();
                            @endphp
                            <div id="step-1">
                                <form class="custom" role="form" method="POST"
                                      action="{{ url('/register') }}">
                                    <fieldset class="p-5 rounded border border-info mb-5">
                                        <p class="text-left"><span>*</span> Tell us a little bit about yourself:</p>
                                        <br>
                                        <div class="step_1" id="step">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="register-form-holder">

                                                        {{ csrf_field() }}
                                                        <input type="hidden" class="form-control lat" value=""
                                                               name="lat"
                                                               placeholder=""/>
                                                        <input type="hidden" class="form-control geo_boundary" value=""
                                                               name="geo_boundary"
                                                               placeholder=""/>
                                                        <input type="hidden" class="form-control lng" value=""
                                                               name="lng"
                                                               placeholder=""/>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Account Type</label>
                                                            <select class="custom-select form-control account_type"
                                                                    required name="user_role">
                                                                <!--<option>Are you a Supply or Buyer? </option>-->
                                                                <option value="">Select Account Type</option>
                                                                <option value="2">Buyer</option>
                                                                <option value="3">Supplier</option>
                                                                <option value="4">Charity - Buyer</option>
                                                                <option value="5">Charity - Supplier</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group hide charity_registration_number_area">
                                                            <label for="exampleInputEmail1">Registration Number (Only
                                                                for Charity)</label>
                                                            <input type="text"
                                                                   class="form-control charity_registration_number_field"
                                                                   required
                                                                   name="charity_registration_number">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Contact Name</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ old('name') }}" required
                                                                           name="name" placeholder="Contact Name"/>
                                                                    @if ($errors->has('name'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Company Name</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ old('company_name') }}"
                                                                           name="company_name"
                                                                           placeholder="Company Name"/>
                                                                    @if ($errors->has('company_name'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label>Street Address </label>
                                                            <input type="text"
                                                                   class="form-control raddress s1 raddress1"
                                                                   value="{{ old('street') }}" required name="street"
                                                                   placeholder="Enter Street Address "/>
                                                            @if ($errors->has('address'))
                                                                <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                                            @endif
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>City </label>
                                                                    <input type="text" class="form-control raddress s2"
                                                                           value="{{ old('city') }}"
                                                                           name="city" placeholder="Enter City"/>
                                                                    @if ($errors->has('address'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>State </label>
                                                                    <input type="text" class="form-control raddress s5"
                                                                           value="{{ old('state') }}"
                                                                           name="state" placeholder="Enter State "/>
                                                                    @if ($errors->has('address'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Zip Code </label>
                                                                    <input type="text" class="form-control raddress s3"
                                                                           value="{{ old('zipcode') }}"
                                                                           name="zipcode" placeholder="Enter Zipcode "/>
                                                                    @if ($errors->has('address'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <input type="text" class="form-control raddress s4"
                                                                           value="{{ old('country') }}"
                                                                           name="country" placeholder="Enter Country "/>
                                                                    @if ($errors->has('address'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="text" class="form-control email" name="email"
                                                                   required
                                                                   value="{{ old('email') }}"
                                                                   placeholder="Email Address"/>
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                            @endif
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="password" class="form-control"
                                                                           name="password"
                                                                           required
                                                                           placeholder="Password"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Password Confirmation</label>
                                                                    <input type="password" class="form-control"
                                                                           name="password_confirmation" required
                                                                           placeholder="Password Confirmation"/>
                                                                    @if ($errors->has('password_confirmation'))
                                                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- next button -->
                                        <hr class="mt-5">
                                        <input type="submit" class="mt-5 action-button float-right"
                                               value="Register Now"/>

                                    </fieldset>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>


    </div>
@endsection
@section('js-file')
    <script src="{{asset('raw/js/multiStep_reg.js')}}"></script>
    <script type="text/javascript">

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
                url: "https://maps.google.com/maps/api/geocode/json?address=" + address + "&sensor=false&region=$region&key=AIzaSyBG-y42FrctIWrVsrwioQ8aIzeGOceRwKI",
                type: "get",
                success: function (result) {
                    // var lat = result.results[0].geometry.location.lat;
                    // var lng = result.results[0].geometry.location.lng;
                    // $(".lat").val(lat);
                    // $(".lng").val(lng);
                }
            });
        }


        $('.account_type').change(function () {
            var $option = $(this).find('option:selected');
            var value = $option.val();//to get content of "value" attrib
            if (value == '4' || value == 5) {
                $(".charity_registration_number_area").removeClass('hide');
                $(".charity_registration_number_field").attr('required', true);
            } else {
                $(".charity_registration_number_area").addClass('hide');
                $(".charity_registration_number_field").attr('required', false);
            }
        });
    </script>
@endsection
