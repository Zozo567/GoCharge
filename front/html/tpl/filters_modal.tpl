<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalCenterTitle">Filters</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
    	</div>
        <form id="filterForm" action="point/getFilter" method="post">
            <div class="modal-body">
                <div class="filterWrap">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Stationary Charger Types</h1>
                    </div>
                    <input type="hidden" name="action" value="point/getFilter">

                    <div class="row">
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/typeA.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="static_typeA" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/typeC.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="static_typeC" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/microB.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="static_microB" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-3 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/lightning.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="static_lightning" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Disposable Charger Types</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/typeC.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="disp_typeC" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/microB.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="disp_microB" value="true"/>
                                <!-- <i class="fa fa-check hidden"></i> -->
                            </label>
                        </div>
                        <div class="col-md-4 nopad text-center">
                            <label class="image-checkbox">
                                <img src="front/assets/images/lightning.png" class="img-responsive img-fluid">
                                <input type="checkbox" name="disp_lightning" value="true"/>
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