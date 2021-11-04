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
                                <li class="active" id="setp_2"></li>
                                <li class="active" id="setp_3"></li>
                            </ul>
                            <!------------------------------------ step 01 start----------------------------------------------- -->
                            <div id="step-3" class="text-left p-5 rounded border border-info mb-5">
                                <form name="logistics_form" id="preference_form" method="Post"
                                      action="{{url('/')}}/finish/registration">
                                    {{ csrf_field() }}

                                    <label for=""><small>RESET FOODS INCORPORATED <br>
                                            TERMS & CONDITIONS OF RESETFOODS MARKETPLACE SALE</small></label>
                                    <textarea name="" id="" cols="10" rows="8" class="form-control"></textarea>
                                    <br>
                                    <label for="">
                                        <small>
                                            RESET FOODS INCORPORATED <br>
                                            PRIVACY POLICY <br>
                                        </small>
                                    </label>
                                    <textarea name="" id="" cols="10" rows="8" class="form-control"></textarea>

                                    <br>

                                    <div class="form-check pb-1">
                                        <input required class="form-check-input" type="checkbox" value="1"
                                               name="terms_and_privacy"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Confirmed. I have read and agree with the Terms, Conditions and Privacy
                                            policy.
                                        </label>
                                    </div>
                                    <hr class="mt-5">
                                    <input type="submit" class="action-button float-right"
                                           value="Finish Registration"/>
                                    <br>
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
    </script>
@endsection
