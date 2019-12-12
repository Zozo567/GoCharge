<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="modal-header bg-gradient-primary">
        	<h5 class="modal-title text-gray-100" id="exampleModalCenterTitle">Filters / Charger types in Service</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
    	</div>
        <form id="filterForm" action="point/getFilter" method="post">

        <input type="hidden" name="action" value="point/getFilter">
            <div class="modal-body">
                <div class="filterWrap">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">In-cabinet Chargers</h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-lg-3 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wirestatic-usb_a" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/typeA.png" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-lg-3 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wirestatic-micro_usb_b" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/microB.png" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-lg-3 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wirestatic-usb_type_c" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/typeC.png" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-lg-3 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wirestatic-iphone_lightning" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/lightning.png" class="img-fluid">
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="boldy">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Items For Sale</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Disposable Power Banks:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="powdisp-micro_usb_b" value="true">
                                <label class="custom-control-label">micro USB-B
                                    <img src="front/assets/images/charger_types/micro_usb_b.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="powdisp-usb_type_c" value="true">
                                <label class="custom-control-label">USB Type-C
                                    <img src="front/assets/images/charger_types/usb_type_c.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="powdisp-iphone_lightning" value="true">
                                <label class="custom-control-label">Lightning
                                    <img src="front/assets/images/charger_types/iphone_lightning.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                    </div>    
                    <hr>
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Special Charging Tools:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tools-walking_generator" value="true">
                                <label class="custom-control-label">Walking generator
                                    <img src="front/assets/images/charger_types/walking_generator_h.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tools-cycling_generator" value="true">
                                <label class="custom-control-label">Cycling <br/>generator
                                    <img src="front/assets/images/charger_types/cycling_generator_h.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tools-solar_charger" value="true">
                                <label class="custom-control-label">Solar charger
                                    <img src="front/assets/images/charger_types/solar.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Chargers:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="charge-samsung_charger" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/samsung.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="charge-iphone_charger" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/iphone.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Charging Cables/Wires:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wiresale-micro_usb_b" value="true">
                                <label class="custom-control-label">micro USB-B
                                    <img src="front/assets/images/charger_types/micro_usb_b.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wiresale-usb_type_c" value="true">
                                <label class="custom-control-label">USB Type-C
                                    <img src="front/assets/images/charger_types/usb_type_c.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wiresale-iphone_lightning" value="true">
                                <label class="custom-control-label">Lightning
                                    <img src="front/assets/images/charger_types/iphone_lightning.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Power Banks:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="pownodisp-anker" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/anker.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="custom-control custom-checkbox image-checkbox">
                                <input type="checkbox" class="custom-control-input" name="ppownodisp-samsung" value="true">
                                <label class="custom-control-label">
                                    <img src="front/assets/images/charger_types/samsung.svg" class="img-fluid">
                                </label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            </form>
        	<div class="modal-footer">
                <button id="clearFilter" class="btn btn-warning bg-gradient-warning">Clear Filter</button>
                <button type="submit" id="setFilter" class="btn btn-info bg-gradient-info">Set Filter</button>
        	</div>
    </div>
</div>