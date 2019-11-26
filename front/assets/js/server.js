var Go = Go_ ? Go_ : {};

$(document).ready(function(){

    console.log(Go.map);


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

        $.ajax({
            url: url,
            data : "action=" + url + "/read",
            type: 'POST',
            dataType : 'json',
            success : function( res ) {
                console.log('success');
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
});

Go.addMapObject = function(){

    $.ajax({
        url: 'point',
        data : "action=" + 'point' + "/read",
        type: 'POST',
        dataType : 'json',
        success : function( res ) {
            for (var i = 0; i < res.content.length; i ++) {
                var thisLat = parseFloat(res.content[i].latiude);
                var thisLng = parseFloat(res.content[i].longitude);
                var thisLatLng = new google.maps.LatLng(thisLat,thisLng);
                var marker = new google.maps.Marker({
                    position: thisLatLng,
                    title: res.content[i].name + res.content[i].address,
                    icon: 'front/assets/images/charging_point_red.png'
                });
                marker.setMap(Go_.map);

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
