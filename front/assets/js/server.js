// var Go = Go_ ? Go_ : {};

var Go = {};

// Global variables to use in 'trip_planner_modal' script
var POINTS = [];
var MARKERS = [];
var A_POINT = '';
var B_POINT = '';
var A_MARKER;
var B_MARKER;

$(document).ready(function(){

    console.log(Go.map);

    // Go.initMap();


    Go.addMapObject();

    // jQuery('body').on('click', '.terms-conditions', function(){
    //     if( jQuery('.menu-drop-terms-conditions').hasClass('menu-undrop') )
    //         jQuery('.menu-drop-terms-conditions').removeClass('menu-undrop').addClass('menu-drop');
    //     else
    //         jQuery('.menu-drop-terms-conditions').removeClass('menu-drop').addClass('menu-undrop');
    // });

    // jQuery('body').on('click', '.download-app', function(){
    //     if( jQuery('.menu-drop-download-app').hasClass('menu-undrop') )
    //         jQuery('.menu-drop-download-app').removeClass('menu-undrop').addClass('menu-drop');
    //     else
    //         jQuery('.menu-drop-download-app').removeClass('menu-drop').addClass('menu-undrop');
    // });

    $('body').on('click', '.showmodal', function(e){

        e.preventDefault();

        var url = $(this).find('a').data('action');
        var switch_modal = $(this).find('a').hasClass('switchmodal');

        $.ajax({
            url: url,
            data : "action=" + url + "/read",
            type: 'POST',
            dataType : 'json',
            success : function( res ) {
                console.log('success');
                if (switch_modal) { $('#showModal').empty(); }
                $('#showModal').append( res.content );
                $('#showModal').modal('show');
            },
            error : function ( jqXHR, textStatus, errorThrown ) {
                console.log('error');
            }
        });
    });

    $('#showModal').on('hidden.bs.modal', function () {
        $('#showModal').empty();
    });

    $('#showModal').on('shown.bs.modal', function() {
        // init the state from the input
        $(".image-checkbox").each(function () {
            if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                $(this).addClass('image-checkbox-checked');
            }
            else {
                $(this).removeClass('image-checkbox-checked');
            }
        });

        // sync the state to the input
        $(".image-checkbox").on("click", function (e) {
            $(this).toggleClass('image-checkbox-checked');
            var $checkbox = $(this).find('input[type="checkbox"]');
            $checkbox.prop("checked",!$checkbox.prop("checked"));

            e.preventDefault();
        });
    });

    jQuery('body').on('click', '#setFilter', function(e){

        
        e.preventDefault(); //prevent default action 

        form = jQuery('body').find('#filterForm');
        var post_url = form.attr("action"); //get form action url
        var request_method = form.attr("method"); //get form GET/POST method
        var form_data = form.serialize(); //Encode form elements for submission

        $.ajax({
            url : post_url,
            type: 'POST',
            data : form_data,
            dataType : 'json',
            success : function( res ) {
                console.log(res);
            for (var i = 0; i < res.content.length; i ++) {
                var thisLat = parseFloat(res.content[i].latitude);
                var thisLng = parseFloat(res.content[i].longitude);
                var thisLatLng = new google.maps.LatLng(thisLat,thisLng);
                var marker = new google.maps.Marker({
                    position: thisLatLng,
                    title: res.content[i].name + res.content[i].address,
                    icon: 'front/assets/images/charging_point_red.png'
                });
                marker.setMap(Go.map);

                var infowindow = new google.maps.InfoWindow({
                    content: '<div id="content">'+
                                '<h6>'+ res.content[i].name +'</h6>'+
                                '<div><b>'+ res.content[i].address +'</b></div><hr>'+
                                '<div><i class="fas fa-plug"></i> Disposable charger : '+
                                    res.content[i].powerbanks.disposable_charger +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Micro USB : '+
                                    res.content[i].powerbanks.micro_usb +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB A : '+
                                    res.content[i].powerbanks.usb_a +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB Type C : '+
                                    res.content[i].powerbanks.usb_type_c +
                                '</div>'+
                             '</div>'
                });
                marker.addListener('click', infoCallback(infowindow, marker));
            }
            },
            error : function ( jqXHR, textStatus, errorThrown ) {
                console.log('error');
            }
        });
        
        // $.ajax({
        //     url : post_url,
        //     type: 'POST',
        //     data : form_data,
        //     dataType : 'json',
        // }).success(function(res){

        //     console.log(res);
        //     for (var i = 0; i < res.content.length; i ++) {
        //         var thisLat = parseFloat(res.content[i].latitude);
        //         var thisLng = parseFloat(res.content[i].longitude);
        //         var thisLatLng = new google.maps.LatLng(thisLat,thisLng);
        //         var marker = new google.maps.Marker({
        //             position: thisLatLng,
        //             title: res.content[i].name + res.content[i].address,
        //             icon: 'front/assets/images/charging_point_red.png'
        //         });
        //         marker.setMap(Go.map);

        //         var infowindow = new google.maps.InfoWindow({
        //             content: '<div id="content">'+
        //                         '<h6>'+ res.content[i].name +'</h6>'+
        //                         '<div><b>'+ res.content[i].address +'</b></div><hr>'+
        //                         '<div><i class="fas fa-plug"></i> Disposable charger : '+
        //                             res.content[i].powerbanks.disposable_charger +
        //                         '</div>'+
        //                         '<div><i class="fas fa-charging-station"></i> Micro USB : '+
        //                             res.content[i].powerbanks.micro_usb +
        //                         '</div>'+
        //                         '<div><i class="fas fa-charging-station"></i> USB A : '+
        //                             res.content[i].powerbanks.usb_a +
        //                         '</div>'+
        //                         '<div><i class="fas fa-charging-station"></i> USB Type C : '+
        //                             res.content[i].powerbanks.usb_type_c +
        //                         '</div>'+
        //                      '</div>'
        //         });
        //         marker.addListener('click', infoCallback(infowindow, marker));
        //     }
        // });
        $('#showModal').modal('hide');
    });

});

// Go.initMap = function initMap() {
    
//     Go.map = new google.maps.Map(document.getElementById('map'), {
//         center: {lat: 47.4979, lng: 19.0402},
//         zoom: 12,
//         disableDefaultUI: true
//     });

// };

Go.addMapObject = function(){

    $.ajax({
        url: 'point',
        data : "action=" + 'point' + "/read",
        type: 'POST',
        dataType : 'json',
        success : function( res ) {
            for (var i = 0; i < res.content.length; i ++) {
                var thisLat = parseFloat(res.content[i].latitude);
                var thisLng = parseFloat(res.content[i].longitude);
                var thisLatLng = new google.maps.LatLng(thisLat,thisLng);
                var marker = new google.maps.Marker({
                    position: thisLatLng,
                    title: res.content[i].name + res.content[i].address,
                    icon: 'front/assets/images/charging_point_red.png'
                });
                marker.setMap(Go.map);

                MARKERS.push(marker);

                var infowindow = new google.maps.InfoWindow({
                    content: '<div id="content">'+
                                '<h6>'+ res.content[i].name +'</h6>'+
                                '<div><b>'+ res.content[i].address +'</b></div><hr>'+
                                '<div><i class="fas fa-plug"></i> Disposable charger : '+
                                    res.content[i].powerbanks.disposable_charger +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Micro USB : '+
                                    res.content[i].powerbanks.micro_usb +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB A : '+
                                    res.content[i].powerbanks.usb_a +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB Type C : '+
                                    res.content[i].powerbanks.usb_type_c +
                                '</div>'+
                             '</div>'
                });
                marker.addListener('click', infoCallback(infowindow, marker));
            }
        },
        error : function ( jqXHR, textStatus, errorThrown ) {
            console.log('error');
        }
    });
};

function infoCallback(infowindow, marker) {
    return function() {
        infowindow.open(map, marker);
    };
}

$('body').on('click', '#askLocation', function(e) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;

        var thisLatLng = new google.maps.LatLng(lat, lng);
        var marker = new google.maps.Marker({
            position: thisLatLng,
            title: 'Your location',
            icon: 'front/assets/images/location-pin.png'
        });
        
        marker.setMap(Go.map);
        A_POINT = 'MY LOCATION';
        A_MARKER = marker;

        $('#startPoint').val('MY LOCATION');

        var infowindow = new google.maps.InfoWindow({
            content: '<div id="content">'+
                        '<h6>Your location</h6>'+
                        '</div>'
        });
        
        marker.addListener('click', infoCallback(infowindow, marker));
    });
});

// Trip plane
$('body').on('click', '#tripPlane', function(e){ 

    MARKERS.forEach(M => {
        M.setMap(null);
        M.icon = 'front/assets/images/charging_point_red.png';
        M.setMap(Go.map);
        
        if (M.title.indexOf(A_POINT) != -1) {
            A_MARKER = M;
        }

        if (M.title.indexOf(B_POINT) != -1) {
            B_MARKER = M;
        }
    });

    A_MARKER.setMap(null);
    B_MARKER.setMap(null);
    A_MARKER.icon = 'front/assets/images/location-pin.png';
    B_MARKER.icon = 'front/assets/images/charging_point_blue.png';
    A_MARKER.setMap(Go.map);
    B_MARKER.setMap(Go.map);

    POINTS = [];
    $('#showModal').empty();
    $('#showModal').removeAttr('show');

    // var directionsService = new google.maps.DirectionsService;
    // var directionsDisplay = new google.maps.DirectionsRenderer;
    // directionsDisplay.setOptions({suppressMarkers: true});
  
    // directionsDisplay.setMap(Go.map);

    // var request = {
    //     origin: new google.maps.LatLng(47.491347,19.0525),
    //     destination: new google.maps.LatLng(47.438408,19.2521),
    //     travelMode: google.maps.DirectionsTravelMode.WALKING
    // };

    // directionsService.route(request, function(response, status){
    //     if (status == google.maps.DirectionsStatus.OK){
    //         directionsDisplay.setDirections(response);
    //     }
    // });

    // directionsDisplay.setMap(Go.map);
});

// Open in Google
$('body').on('click', '#openGoogle', function(e){ 

    MARKERS.forEach(M => {
        M.setMap(null);
        M.icon = 'front/assets/images/charging_point_red.png';
        M.setMap(Go.map);
        
        if (M.title.indexOf(A_POINT) != -1) {
            A_MARKER = M;
        }

        if (M.title.indexOf(B_POINT) != -1) {
            B_MARKER = M;
        }
    });

    var lat_A = A_MARKER.getPosition().lat();
    var lng_A = A_MARKER.getPosition().lng();
    var lat_B = B_MARKER.getPosition().lat();
    var lng_B = B_MARKER.getPosition().lng();

    // console.log('https://www.google.com/maps/dir/?api=1&origin='+lat_A+','+lng_A+'&destination='+lat_B+','+lng_B+'&travelmode=walking');

    window.open('https://www.google.com/maps/dir/?api=1&origin='+lat_A+','+lng_A+'&destination='+lat_B+','+lng_B+'&travelmode=walking');
});