$(document).ready(function () {

	$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
	});

});

ymaps.ready(init);
	
function init(){
    var myMap = new ymaps.Map("map", {
        center: [47.4979, 19.0402],
        zoom: 13
    });
}

