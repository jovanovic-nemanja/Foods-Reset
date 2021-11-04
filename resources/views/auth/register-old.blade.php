@extends('layouts.frontendTemplate')
@section('css-file')
    <link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}?v={{time()}}" rel="stylesheet">
    <style>
        #instantbookingjt_chosen {
            width: 100% !important;
        }

        .chosen-container-multi .chosen-choices {
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
        }
    </style>
@endsection
@section('content')
    <body onload="initialize()">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo-wraper">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('img/logo-new.jpg') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="progress-bar">
            <p class="progress-bar-label">Step 1 of 7</p>
            <div class="progress-bar-inner">
                <div class="progress-bar-filled" style="transform: scaleX(0.00);"></div>
                <span class="progress-step-number show">1</span>
                <span class="progress-step-number show-2" style="left: calc(16.6666% - 15px)">2</span>
                <span class="progress-step-number show-3" style="left: calc(33.3333% - 15px)">3</span>
                <span class="progress-step-number show-4" style="left: calc(50.0000% - 15px)">4</span>
                <span class="progress-step-number show-5" style="left: calc(66.6666% - 15px)">5</span>
                <span class="progress-step-number show-6" style="left: calc(83.3333% - 15px)">6</span>
                <span class="progress-step-number show-7" style="left: calc(100.0000% - 15px)">7</span>
            </div>
        </div>
        <div class="container step-component active">
            <div class="row">
                <p>Tell us a little bit about you:</p>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sel-account" class="ml--15">Account Type</label>
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Buyer</option>
                            <option value="Supplier">Supplier</option>
                            <option value="Both">Both</option>
                            <option value="Charity">Charity</option>
                        </select>
                    </div>
                    <div>
                        <p class="ml--15">I'm interested in:</p>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="optradio">Producers/Famers
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="optradio">Processors
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="optradio">Distributors
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="optradio">Re-distributor/Opportunity Buyers
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="optradio">Food Charity
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="optradio">Other
                            </label>
                            <div class="d-inline-block ml-3">
                            <input type="text" class="form-control" placeholder="Please Specify" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4">
                    <p class="ml--15">Product Categories that I buy or sell:</p>
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <p>Frequency of Disbursements</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check disabled pt-3 pb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Meat
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Intermittent</option>
                            <option value="Supplier">Daily</option>
                            <option value="Both">Weekly</option>
                            <option value="Charity">biweekly</option>
                            <option value="Both">monthly</option>
                            <option value="Charity">quareterly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check disabled pt-3 pb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Meat
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Intermittent</option>
                            <option value="Supplier">Daily</option>
                            <option value="Both">Weekly</option>
                            <option value="Charity">biweekly</option>
                            <option value="Both">monthly</option>
                            <option value="Charity">quareterly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check disabled pt-3 pb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Meat
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Intermittent</option>
                            <option value="Supplier">Daily</option>
                            <option value="Both">Weekly</option>
                            <option value="Charity">biweekly</option>
                            <option value="Both">monthly</option>
                            <option value="Charity">quareterly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check disabled pt-3 pb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Meat
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Intermittent</option>
                            <option value="Supplier">Daily</option>
                            <option value="Both">Weekly</option>
                            <option value="Charity">biweekly</option>
                            <option value="Both">monthly</option>
                            <option value="Charity">quareterly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check disabled pt-3 pb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Meat
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Intermittent</option>
                            <option value="Supplier">Daily</option>
                            <option value="Both">Weekly</option>
                            <option value="Charity">biweekly</option>
                            <option value="Both">monthly</option>
                            <option value="Charity">quareterly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check disabled pt-3 pb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Meat
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="sel-account" name="sel-account">
                            <option value="Buyer">Intermittent</option>
                            <option value="Supplier">Daily</option>
                            <option value="Both">Weekly</option>
                            <option value="Charity">biweekly</option>
                            <option value="Both">monthly</option>
                            <option value="Charity">quareterly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <button class="btn btn-info" onClick="continue_btn()">Next</button>
                </div>
            </div>
        </div>



        <div class="container step-component">
            <div class="row">
                <p>Contact Details</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="usr">Company Name</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="usr">Company Nickname to display on Site</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Primary Contact</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="First Name">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Primary Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone numbers & fax numbers</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Business</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Business Number">
                            <input type="text" class="form-control" placeholder="Business Fax">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Business</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Mobile Number">
                            <input type="text" class="form-control" placeholder="Other Fax">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Other</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Other Number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <p>Notifications</p>
                <div class="col-md-12">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">When a new product in my product preferences has posted - Buyer only
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">Bid is won
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">When I have lost a bid
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">When payment is made - Buyer and Seller
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">When payment is cleared/Delivery initiated
                        </label>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <p>Notifications to Primary</p>
                <div class="col-md-12">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">by email
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="optradio">by SMS/Phone (charges may apply)
                        </label>
                    </div>
                </div>
            </div>
            <div class="row pb-5 pt-3 text-center">
                <div class="col-md-12">
                    <button class="btn btn-info" onClick="back_btn()">Back</button>
                    <button class="btn btn-info" onClick="continue_btn()">Next</button>
                </div>
            </div>
        </div>
    </div>
    <main role="main-wrapper" style="display: none;">
        <section role="register-page" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="register-form-holder">
                            <div class="col-sm-12 text-center mb-4">
                                <a href="{{ url('/') }}"><img src="{{ asset('img/logo-new.jpg') }}" alt=""/></a>
                            </div>
                            <form class="custom" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control lat" value="" name="lat" placeholder=""/>
                                <input type="hidden" class="form-control lng" value="" name="lng" placeholder=""/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Buyer</label>
                                    <select class="custom-select form-control" name="user_role">
                                        <!--<option>Are you a Supply or Buyer? </option>-->
                                        <option value="2">Buyer</option>
                                        <!--<option value="3">Supplier</option>-->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" value="{{ old('company_name') }}" required
                                           name="company_name" placeholder="Company Name"/>
                                    @if ($errors->has('company_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" required
                                           name="name" placeholder="Contact Name"/>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Street Address </label>
                                    <input type="text" class="form-control raddress s1 raddress1"
                                           value="{{ old('street') }}" required name="street"
                                           placeholder="Enter Street Address "/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>City </label>
                                    <input type="text" class="form-control raddress s2" value="{{ old('city') }}"
                                           name="city" placeholder="Enter City"/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>State </label>
                                    <input type="text" class="form-control raddress s5" value="{{ old('state') }}"
                                           name="state" placeholder="Enter State "/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Zip Code </label>
                                    <input type="text" class="form-control raddress s3" value="{{ old('zipcode') }}"
                                           name="zipcode" placeholder="Enter Zipcode "/>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control raddress s4" value="{{ old('country') }}"
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
                                           value="{{ old('email') }}" placeholder="Contact email [Confirm]"/>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required
                                           placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input type="password" class="form-control" name="password_confirmation" required
                                           placeholder="Password Confirmation"/>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Email notification </label><br>
                                    <label class="custom-control custom-radio">
                                        <input id="radio11" name="email_notification" value="1" type="radio"
                                               class="custom-control-input email_notification">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Yes</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio12" name="email_notification" checked value="0" type="radio"
                                               class="custom-control-input email_notification">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">No</span>
                                        &nbsp;&nbsp;&nbsp;<input type="text" style="display: none;"
                                                                 class="form-control noti_email" name="noti_email"
                                                                 placeholder="enter email"/>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Text notification </label><br>
                                    <label class="custom-control custom-radio">
                                        <input id="radio13" name="text_notification" value="1" type="radio"
                                               class="custom-control-input text_notification">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Yes</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio14" name="text_notification" checked type="radio" value="0"
                                               class="custom-control-input text_notification">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">NO</span>
                                        &nbsp;&nbsp;&nbsp;<input type="text" style="display: none;"
                                                                 class="form-control mobile" name="mobile"
                                                                 placeholder="Enater Mobile Number"/>
                                    </label>
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
                                                            <input id="radio1" name="geo_boundary" checked type="radio"
                                                                   class="custom-control-input" value="100">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">100km</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="geo_boundary" checked type="radio"
                                                                   class="custom-control-input" value="150">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">150km</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="geo_boundary" checked type="radio"
                                                                   class="custom-control-input" value="200">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">200km</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pickup</td>
                                                    <td>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="pikup" checked type="radio"
                                                                   class="custom-control-input" value="Buyer pickup">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Buyer pickup</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Delivery windows</td>
                                                    <td>
                                                        <input id="" required type="text" value=""
                                                               class="datetimepicker44" name="delivery_window">
                                                        -
                                                        <input id="" required type="text" value=""
                                                               class="datetimepicker444" name="delivery_window_to">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Delivery Location</td>
                                                    <td><input type="text" name="delivery_location"
                                                               class="form-control rdelivery_location" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Delivery Services</td>
                                                    <td>
                                                        <select id="instantbookingjt" data-placeholder="Select one"
                                                                class="input form-input chosen-select"
                                                                name="delivery_service[]" multiple>
                                                            <option value="Inside delivery">Inside delivery</option>
                                                            <option value="Outside Delivery">Outside Delivery</option>
                                                            <option value="Call Before Delivery">Call before delivery
                                                            </option>
                                                            <option value="Lift gate service at delivery">Lift gate
                                                                service at delivery
                                                            </option>
                                                            <option value="Elevated dock at delivery">Elevated dock at
                                                                delivery
                                                            </option>
                                                            <option value="Protect from freezing">Protect from
                                                                freezing
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"
                                              placeholder="Enter text here "></textarea>
                                </div>
                                <div class="row mt-4 mb-4">
                                    <div class="col-sm-12">
                                        <div class="logistics">
                                            <h6>Banking Details</h6>
                                            <table class="table" style="margin:0px; background:none;">
                                                <tr>
                                                    <td>Bank:</td>
                                                    <td><input type="text" name="bank" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Branch:</td>
                                                    <td><input type="text" name="branch" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Transit:</td>
                                                    <td><input type="text" name="transit" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Account Number:</td>
                                                    <td><input type="text" name="account_number" class="form-control"
                                                               value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Details:</td>
                                                    <td><input type="text" name="details" class="form-control" value="">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-blue btn-block">Submit</button>
                                </div>
                                <div class="form-group mb-0" style="text-align:center; margin-top: 10px;">
                                    Already Account? <a href="{{ url('/') }}" style="color: #449DDF;" class="">Sign
                                        in</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
@endsection
@section('js-file')
    <script src="{{ asset('js/chosen.jquery.js') }}?v={{time()}}" type="text/javascript"></script>
    <script src="{{ asset('js/register.js') }}?v={{time()}}" type="text/javascript"></script>
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