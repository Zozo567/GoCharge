<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalCenterTitle">Payment</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
    	</div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 paymentCont">
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h5 text-gray-900 mb-4">Choose your payment method below</h1>
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
                        <div class="text-center">
                            <h1 class="h5 text-gray-900 mb-4">Payment Information</h1>
                        </div>
                        <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                            <div>
                                <input name="utf8" type="hidden" value="✓" />
                                <input name="_method" type="hidden" value="PUT" />
                                <input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" />
                            </div>
                              <div class='form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control'>
                              </div>
                        
                              <div class='form-group required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' size='20'>
                              </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-4">
                                <label class='control-label'>Month</label>
                                <input class="form-control" id="card-expiry-month" size="2" placeholder="MM">
                              </div>
                              <div class="col-sm-4">
                                <label class='control-label'>Year</label>
                                <input class="form-control" id="card-expiry-year" size="4" placeholder="YYYY">
                              </div>
                              <div class="col-sm-4">
                                <label class='control-label'>CVC</label>
                                <input class="form-control" id="card-cvc" size="3" placeholder="CVC">
                              </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">I agree to the Terms & Conditions</label>
                                </div>
                            </div>
                            <button class="btn btn-success btn-submit btn-block">Pay</button>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>