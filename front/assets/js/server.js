// var Go = Go_ ? Go_ : {};

var Go = {};

// Global variables to use in 'trip_planner_modal' script
var POINTS = [];
var MARKERS = [];
var A_POINT = '';
var B_POINT = '';
var A_MARKER;
var B_MARKER;
var btnID = -1;

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

                // Check btnID
                if (url == 'trip_planner') {
                    $('#askLocation').click();
                    if (btnID != -1) {
                        addPointData();
                    }
                }
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

        MARKERS = [];

        $.ajax({
            url : post_url,
            type: 'POST',
            data : form_data,
            dataType : 'json',
            success : function( res ) {
                console.log(res);
                for (var i = 0; i < res.content.length; i ++) {
                    var thisLat = parseFloat(res.content[i].info_point.latitude);
                    var thisLng = parseFloat(res.content[i].info_point.longitude);
                    var thisLatLng = new google.maps.LatLng(thisLat,thisLng);
                    var marker = new google.maps.Marker({
                        position: thisLatLng,
                        title: res.content[i].info_point.name + res.content[i].info_point.address,
                        icon: 'front/assets/images/charging_point_red.png'
                    });
                    marker.setMap(Go.map);

                    MARKERS.push(marker);

                    var infowindow = new google.maps.InfoWindow({
                        content: '<div id="content">'+
                                '<h6>'+ res.content[i].info_point.name +'</h6>'+
                                '<div><b>'+ res.content[i].info_point.address +'</b></div><hr>'+
                                '<h6>In-cabinet chargers:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> USB-A : '+
                                    res.content[i].wirestatic0usb_a +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Micro-USB-B : '+
                                    res.content[i].wirestatic0micro_usb_b +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB-Type-C : '+
                                    res.content[i].wirestatic0usb_type_c +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone-Lightning : '+
                                    res.content[i].wirestatic0iphone_lightning +
                                '</div>'+
                                '<h6>Charging Cables:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Micro-USB-B : '+
                                    res.content[i].wiresale0micro_usb_b +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB-Type-C : '+
                                    res.content[i].wiresale0usb_type_c +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone-Lightning : '+
                                    res.content[i].wiresale0iphone_lightning +
                                '</div>'+
                                '<h6>Disposable Power Banks:</h6>'+
                                '<div><i class="fas fa-charging-station"></i>  Micro-USB-B : '+
                                    res.content[i].powdisp0micro_usb_b +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB-Type-C : '+
                                    res.content[i].powdisp0usb_type_c +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone-Lightning '+
                                    res.content[i].powdisp0iphone_lightning +
                                '</div>'+
                                '<h6>Disposable Power Banks:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Anker 12000mA : '+
                                    res.content[i].pownodisp0anker +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Samsung 5000mA : '+
                                    res.content[i].pownodisp0samsung +
                                '</div>'+
                                '<h6>Special Charging Tools:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Walking-Generator : '+
                                    res.content[i].tools0walking_generator +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Cycling-Generator : '+
                                    res.content[i].tools0cycling_generator +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Solar Charger : '+
                                    res.content[i].tools0solar_charger +
                                '</div>'+
                                '<h6>Chargers:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Samsung charger : '+
                                    res.content[i].charge0samsung_charger +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone charger : '+
                                    res.content[i].charge0iphone_charger +
                                '</div>'+
                                '<div><button type="button" id="'+i+'btn" class="btn btn-success goBtn">Go there</button></div>'+
                             '</div>'
                    });
                    marker.addListener('click', infoCallback(infowindow, marker));
                }
                
                // For Search
                addPoints();
                autocomplete(document.getElementById("searchInput"), POINTS);
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


    $('body').on('click', '#askLocation', function(e) {
        // navigator.geolocation.getCurrentPosition(function(position) {
        //     var lat = position.coords.latitude;
        //     var lng = position.coords.longitude;
    
        //     var thisLatLng = new google.maps.LatLng(lat, lng);
        //     var marker = new google.maps.Marker({
        //         position: thisLatLng,
        //         title: 'Your location',
        //         icon: 'front/assets/images/location-pin.png'
        //     });
            
        //     marker.setMap(Go.map);
        //     A_POINT = 'MY LOCATION';
        //     A_MARKER = marker;
    
        //     $('#startPoint').val('MY LOCATION');
    
        //     var infowindow = new google.maps.InfoWindow({
        //         content: '<div id="content">'+
        //                     '<h6>Your location</h6>'+
        //                     '</div>'
        //     });
            
        //     marker.addListener('click', infoCallback(infowindow, marker));
        // });

        MARKERS.forEach(M => {
            if (M.title.indexOf('ELTE') != -1) {
                A_MARKER = M;
            }
        });

        A_POINT = 'MY LOCATION';
        $('#startPoint').val('MY LOCATION');
    });
    
    $('body').on('click', '#searchBtn', function(e) {
        var point = $('#searchInput').val();
        
        MARKERS.forEach(M => {
            if (M.title == point) {
                Go.map.setCenter(M.position);
                Go.map.setZoom(20);
                google.maps.event.trigger(M, 'click');
            }
        });
    });

    $('body').on('click', '#locationBtn', function(e) {
        MARKERS.forEach(M => {
            if (M.title.indexOf('ELTE') != -1) {
                Go.map.setCenter(M.position);
                Go.map.setZoom(20);
                google.maps.event.trigger(M, 'click');
            }
        });
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
    
    // Click btn - save ID
    $('body').on('click', '.goBtn', function(e) {
        var str = e.currentTarget.id;
        var n = str.indexOf('btn');
        btnID = str.substring(0, n);
    
        // And go to planner
        $('#planner').click();
    })

});

// Go.initMap = function initMap() {
    
//     Go.map = new google.maps.Map(document.getElementById('map'), {
//         center: {lat: 47.4979, lng: 19.0402},
//         zoom: 12,
//         disableDefaultUI: true
//     });

// };

Go.addMapObject = function(){

    MARKERS = [];

    $.ajax({
        url: 'point',
        data : "action=" + 'point' + "/read",
        type: 'POST',
        dataType : 'json',
        success : function( res ) {
            for (var i = 0; i < res.content.length; i ++) {
                var thisLat = parseFloat(res.content[i].info_point.latitude);
                var thisLng = parseFloat(res.content[i].info_point.longitude);
                var thisLatLng = new google.maps.LatLng(thisLat,thisLng);
                var marker = new google.maps.Marker({
                    position: thisLatLng,
                    title: res.content[i].info_point.name + res.content[i].info_point.address,
                    icon: 'front/assets/images/charging_point_red.png'
                });
                marker.setMap(Go.map);

                MARKERS.push(marker);

                var infowindow = new google.maps.InfoWindow({
                    content: '<div id="content">'+
                                '<h6>'+ res.content[i].info_point.name +'</h6>'+
                                '<div><b>'+ res.content[i].info_point.address +'</b></div><hr>'+
                                '<h6>In-cabinet chargers:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> USB-A : '+
                                    res.content[i].wirestatic0usb_a +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Micro-USB-B : '+
                                    res.content[i].wirestatic0micro_usb_b +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB-Type-C : '+
                                    res.content[i].wirestatic0usb_type_c +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone-Lightning : '+
                                    res.content[i].wirestatic0iphone_lightning +
                                '</div>'+
                                '<h6>Charging Cables:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Micro-USB-B : '+
                                    res.content[i].wiresale0micro_usb_b +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB-Type-C : '+
                                    res.content[i].wiresale0usb_type_c +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone-Lightning : '+
                                    res.content[i].wiresale0iphone_lightning +
                                '</div>'+
                                '<h6>Disposable Power Banks:</h6>'+
                                '<div><i class="fas fa-charging-station"></i>  Micro-USB-B : '+
                                    res.content[i].powdisp0micro_usb_b +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> USB-Type-C : '+
                                    res.content[i].powdisp0usb_type_c +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone-Lightning '+
                                    res.content[i].powdisp0iphone_lightning +
                                '</div>'+
                                '<h6>Disposable Power Banks:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Anker 12000mA : '+
                                    res.content[i].pownodisp0anker +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Samsung 5000mA : '+
                                    res.content[i].pownodisp0samsung +
                                '</div>'+
                                '<h6>Special Charging Tools:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Walking-Generator : '+
                                    res.content[i].tools0walking_generator +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Cycling-Generator : '+
                                    res.content[i].tools0cycling_generator +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> Solar Charger : '+
                                    res.content[i].tools0solar_charger +
                                '</div>'+
                                '<h6>Chargers:</h6>'+
                                '<div><i class="fas fa-charging-station"></i> Samsung charger : '+
                                    res.content[i].charge0samsung_charger +
                                '</div>'+
                                '<div><i class="fas fa-charging-station"></i> iPhone charger : '+
                                    res.content[i].charge0iphone_charger +
                                '</div>'+
                                '<div><button type="button" id="'+i+'btn" class="btn btn-success goBtn">Go there</button></div>'+
                             '</div>'
                });
                marker.addListener('click', infoCallback(infowindow, marker));
            }

            // For Search
            addPoints();
            autocomplete(document.getElementById("searchInput"), POINTS);
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

// 
// NOT USED
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

// Add data to Planner
function addPointData() {
    B_POINT = MARKERS[btnID].title;
    $('#endPoint').val(B_POINT);
    btnID = -1;
}

// MARKERS already loaded
function addPoints() {
    POINTS = [];

    MARKERS.forEach(M => {
        POINTS.push(M.title);
    });
}

//////////
//////////
//////////
//////////
//////////
//////////
//////////
//////////
//////////
//////////
//////////

function autocomplete(inp, arr) {
    var currentFocus;
    
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();

        if (!val) { return false;}
        currentFocus = -1;
        
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                
                    if (inp.id == 'startPoint') {
                        A_POINT = this.getElementsByTagName("input")[0].value;
                    } else {
                        B_POINT = this.getElementsByTagName("input")[0].value;
                    }

                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });

                a.appendChild(b);
            }
        }
    });
    
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}