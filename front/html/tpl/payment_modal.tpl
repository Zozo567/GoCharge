<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalCenterTitle">Payment</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
    	</div>
        <div class="modal-body">
            <div class="container">
                <div class="paymentCont">
                    <div class="headingWrap">
                        <h6 class="headingTop text-center">Choose your payment method below</h6>  
                    </div>
                    <div class="paymentWrap">
                        <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                            <label class="btn paymentMethod active">
                                <div class="method visa"></div>
                                <input type="radio" name="options" checked> 
                            </label>
                            <label class="btn paymentMethod">
                                <div class="method master-card"></div>
                                <input type="radio" name="options"> 
                            </label>
                            <label class="btn paymentMethod">
                                <div class="method amex"></div>
                                <input type="radio" name="options">
                            </label>
                        </div>
                    </div>
                </div>

                <div class='col-md-9'>
                    <div class="headingWrap">
                        <h6 class="headingTop text-center">Payment Information</h6>
                    </div>
                    <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                        <div style="margin:0;padding:0;display:inline">
                            <input name="utf8" type="hidden" value="✓" />
                            <input name="_method" type="hidden" value="PUT" />
                            <input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" />
                        </div>
                        <div class='form-row'>
                          <div class='col-md-9 form-group required'>
                            <label class='control-label'>Name on Card</label>
                            <input class='form-control' type='text'>
                          </div>
                        </div>
                        <div class='form-row'>
                          <div class='col-md-9 form-group required'>
                            <label class='control-label'>Card Number</label>
                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                          </div>
                        </div>
                        <div class='form-row' style="height: 32px;">
                            <div class='col-md-6 form-group'>
                                <label class='control-label'>Expiration</label>
                            </div>
                            <div class='col-md-3 form-group'>
                                <label class='control-label'>CVC</label>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-3 form-group expiration required'>
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-md-3 form-group expiration required'>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                            <div class='col-md-3 form-group cvc required'>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='3' type='text'>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">I agree to the Terms & Conditions</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary">Pay</button>
    	</div>
    </div>
</div>