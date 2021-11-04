<fieldset class="p-5 rounded border border-info mb-5">

    <p class="text-left"><span>*</span> Contact Details:</p>
    <div class="step-2" id="step">
        <div class="row">
            <!-- step-2 left section  -->
            <div class="col-8">
                <div class="company_name">
                    <label for="" class="pt-3">Company Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="primary_contact">
                    <label for="" class="pt-3">Primary Contact</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control"
                                   placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control"
                                   placeholder="Last name">
                        </div>
                    </div>
                </div>

                <div class="phone_number mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form_0 ">
                                <h6 class="text-center">
                                    <u>Phone Number</u></h6>
                            </div> <!-- input group -->
                        </div> <!-- col -->

                        <div class="col-md-6">
                            <div class="form-group form_0 ">
                                <h6 class="text-center">
                                    <u>Fax Numbers</u>
                                </h6>
                            </div> <!-- input group -->
                        </div><!-- col -->
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form_0 ">
                                <label for=""
                                       class=" col-form-label">Business</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="Business Number">
                            </div> <!-- input group -->
                        </div> <!-- col -->

                        <div class="col-md-6">
                            <div class="form-group form_0 ">
                                <label for=""
                                       class=" col-form-label">Business
                                    Fax</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="Business Fax">
                            </div> <!-- input group -->
                        </div><!-- col -->
                    </div>
                    <!-- row -->
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group form_0 ">
                                <label for=""
                                       class=" col-form-label">Mobile</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="Mobile Number">
                            </div> <!-- input group -->
                        </div> <!-- col -->

                        <div class="col">
                            <div class="form-group form_0 ">
                                <label for="" class=" col-form-label">Other
                                    Fax</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="Other Fax">

                            </div> <!-- input group -->
                        </div><!-- col -->
                    </div>
                    <!-- row -->
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group form_0 ">
                                <label for="" class=" col-form-label">Other
                                </label>

                                <input type="text" class="form-control" id=""
                                       placeholder="Other Number">
                            </div> <!-- input group -->
                        </div> <!-- col -->

                        <div class="col">
                            <div class="form-group form_0 ">
                                <label for=""
                                       class="col-form-label">Primary Email
                                </label>
                                <input type="text" class="form-control" id=""
                                       placeholder="Email">
                            </div> <!-- input group -->
                        </div><!-- col -->
                    </div>
                    <!-- row -->


                </div>
            </div>
            <!-- step-2 right section -->
            <div class="col-4">
                <div class="p-3">
                    <label for="" class="pt-3">Company Nickname to display on
                        Site</label>
                    <input type="text" placeholder="Identify me as"
                           class="form-control">
                    <p class="pt-4">
                        Auto generate a name based on business type
                        and number from previous page:
                    </p>
                    <p>
                        Example: Jobber_1234, PRoducer_1235
                    </p>
                    <p class="p-100">
                        Developer to customze code to make it buyer
                        vs. seller specifc, show both if user selected
                        both.
                    </p>
                </div>
            </div>
        </div>
        <div class="step-2-bottom p-50">
            <label for=""> Notifcations</label>

            <div class="check_box">

                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        When a new product in my product preferences has posted -
                        Buyer only
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Bid is won
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        When I Have lost a bid
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        When paymemt is made - Buyer and Seller

                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        When Payment is cleared/Deliverey initiated

                    </label>
                </div>

            </div>
        </div>
        <div class="step-2-bottom p-50">
            <label for=""> Notifcations to Primary
            </label>

            <div class="check_box">

                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        by email
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input" type="checkbox" value=""
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        by SMS/Phone (charges may apply)
                    </label>
                </div>

            </div>
        </div>
    </div>


    <!-- next button area -->

    <hr class="mt-5">
    <input type="button" name="previous"
           class="previous action-button-previous float-left" value="Previous"/>
    <input type="button" name="next" class="next action-button float-right"
           value="Next Step"/>

</fieldset>
