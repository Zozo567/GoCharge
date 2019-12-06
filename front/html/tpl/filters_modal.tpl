<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalCenterTitle">Filters</h5>
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
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">wirestatic-usb_a
                                <!-- <img src="front/assets/images/typeA.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wirestatic-usb_a" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">wirestatic-micro_usb_b
                                <!-- <img src="front/assets/images/typeC.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wirestatic-micro_usb_b" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">wirestatic-usb_type_c
                                <!-- <img src="front/assets/images/microB.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wirestatic-usb_type_c" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">wirestatic-iphone_lightning
                                <!-- <img src="front/assets/images/lightning.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wirestatic-iphone_lightning" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Items For Sale</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Disposable Power Banks:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">powdisp-micro_usb_b
                                <!-- <img src="front/assets/images/typeC.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="powdisp-micro_usb_b" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">powdisp-usb_type_c
                                <!-- <img src="front/assets/images/microB.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="powdisp-usb_type_c" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">powdisp-iphone_lightning
                                <!-- <img src="front/assets/images/lightning.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="powdisp-iphone_lightning" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>    
                    <hr>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Special Charging Tools:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">tools-walking_generator
                                <!-- <img src="front/assets/images/typeC.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="tools-walking_generator" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">tools-cycling_generator
                                <!-- <img src="front/assets/images/microB.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="tools-cycling_generator" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">tools-solar_charger
                                <!-- <img src="front/assets/images/lightning.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="tools-solar_charger" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Chargers:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 nopad text-center">
                            <label class="image-checkbox">charge-samsung_charger
                                <!-- <img src="front/assets/images/typeC.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="charge-samsung_charger" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-6 nopad text-center">
                            <label class="image-checkbox">charge-iphone_charger
                                <!-- <img src="front/assets/images/microB.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="charge-iphone_charger" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Charging Cables:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">wiresale-micro_usb_b
                                <!-- <img src="front/assets/images/typeC.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wiresale-micro_usb_b" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">wiresale-usb_type_c
                                <!-- <img src="front/assets/images/microB.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wiresale-usb_type_c" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">wiresale-iphone_lightning
                                <!-- <img src="front/assets/images/lightning.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="wiresale-iphone_lightning" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Power Banks:</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 nopad text-center">
                            <label class="image-checkbox">pownodisp-anker
                                <!-- <img src="front/assets/images/typeC.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="pownodisp-anker" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-6 nopad text-center">
                            <label class="image-checkbox">pownodisp-samsung
                                <!-- <img src="front/assets/images/microB.png" class="img-responsive img-fluid"> -->
                                <input type="checkbox" name="pownodisp-samsung" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>
                    
                </div>
            </div>
        	<div class="modal-footer">
            	<button type="submit" id="setFilter" class="btn btn-success">Set Filter</button>
        	</div>
        </form>
    </div>
</div>