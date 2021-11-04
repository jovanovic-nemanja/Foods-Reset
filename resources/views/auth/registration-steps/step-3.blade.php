<fieldset class="p-5 rounded border border-info mb-5">

    <p class="text-left"> Company Location Information - SUPPLIER :
    </p>
    <div class="step-" id="step">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Main Ofce or Billing Location
                </label>
                <input type="text" class="form-control" id="inputEmail4"
                       placeholder="Address 1 - Google fll
                                                        ">
            </div>
            <div class="form-group col-md-6">

                <label for="inputEmail4"> Address 2 </label>
                <input type="text" class="form-control" id="inputPassword4"
                       placeholder="Address 2
                                                        ">
            </div>
        </div>
        <!-- first row end-->

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City </label>
                <input type="text" class="form-control" id="inputCity"
                       placeholder="City">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Province/State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Postal Code </label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <!-- second row end -->

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Source Distribution Location Address
                    Nickname </label>
                <input type="text" class="form-control" id="inputPassword4"
                       placeholder="Address Nickname - Location for Meat">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">My Billing Address is the same as my source
                    distribution location:
                </label>
                <br>

                <div class="row">
                    <div class="form-check offset-3 col-2 form-check-inline ">
                        <input class="form-check-input" type="radio"
                               name="inlineRadioOptions" id="inlineRadio1"
                               value="option1">
                        <label class="form-check-label"
                               for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check col-2 float-left form-check-inline ">
                        <input class="form-check-input" type="radio"
                               name="inlineRadioOptions" id="inlineRadio2"
                               value="option2">
                        <label class="form-check-label"
                               for="inlineRadio2">No</label>
                    </div>
                </div>

            </div>
        </div>
        <!-- third row end-->

        <div class="form-group">
            <label for="inputAddress">Address </label>
            <input type="text" class="form-control" id="inputAddress"
                   placeholder="Address 1 -Google fll ">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City </label>
                <input type="text" class="form-control" id="inputCity"
                       placeholder="City">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Province/State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Postal Code </label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <hr>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Delivery Contact </label>
                <input type="text" class="form-control" id="inputEmail4"
                       placeholder="First Name ">
            </div>
            <div class="form-group col-md-6">

                <label for="inputEmail4"> . </label>
                <input type="text" class="form-control" id="inputPassword4"
                       placeholder="Last Name">
            </div>
        </div>
        <p><b>Phone Numbers</b></p>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Business </label>
                <input type="text" class="form-control" id="inputEmail4"
                       placeholder="Business Number">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Mobile </label>
                <input type="text" class="form-control" id="inputPassword4"
                       placeholder="Mobile Number">
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">Delivery Contact Email </label>
            <input type="text" class="form-control" id="inputAddress"
                   placeholder="Email">
        </div>

        <p><b> Delivery Windows:</b></p>
        <div class="row">
            <div class="offset-4 col-4">
                <div class="row">
                    <div class="col-3">
                        <p></p>
                        <label for="">Monday</label>
                        <label for="">Tuesday</label>
                        <label for="">Wednesday</label>
                        <label for="">Tursday</label>
                        <label for="">Friday</label>
                        <label for="">Saturday</label>
                        <label for="">Sunday</label>
                    </div>
                    <div class="col-3">
                        <span class="text-center"> Open</span>

                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                    </div>
                    <div class="col-3">
                        <span class="text-center">Close</span>
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                        <input type="text" name="" id="">
                    </div>
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
