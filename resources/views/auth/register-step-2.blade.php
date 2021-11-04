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
                                <li class="active"  id="setp_1"></li>
                                <li  class="active"  id="setp_2"></li>
                                <li id="setp_3"></li>
                            </ul>
                            <!------------------------------------ step 01 start----------------------------------------------- -->
                            @php
                                $preference = App\Models\Pool::where('pool_type','1')->get();
                            @endphp
                            <div id="step-2" class="text-left p-5 rounded border border-info mb-5">
                                <form name="logistics_form" id="preference_form" method="Post"
                                      action="{{url('/')}}/update/preference">
                                    {{ csrf_field() }}
                                    <h3>Preference</h3>
                                    <br>
                                    @foreach($preference as $p)
                                        <div class="form-check pb-1">
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$p->id}}"
                                                   name="pool[]"
                                                   id="pool_{{$p->id}}">
                                            <label class="form-check-label cursor-pointer"
                                                   for="pool_{{$p->id}}">
                                                {{$p->pool_name}}

                                            </label>
                                        </div>
                                    @endforeach
                                    <hr class="mt-2">
                                    <input type="submit" class="action-button float-right"
                                           value="Update Preference"/>
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
