var Go = Go_ ? Go_ : {};

jQuery(document).ready(function(){

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

    jQuery('body').on('click', '.showmodal', function(e){

        e.preventDefault();

        var url = jQuery(this).find('a').data('action');

        jQuery.ajax({
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

    jQuery.ajax({
        url: 'point',
        data : "action=" + 'point' + "/read",
        type: 'POST',
        dataType : 'json',
        success : function( res ) {
            console.log('success');
            var myLatlng = new google.maps.LatLng(47.519015,19.060211);
            var marker_1 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_1.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.484308,19.076556);
            var marker_2 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_2.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.463978,19.037003);
            var marker_3 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_3.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.506770,19.028717);
            var marker_4 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_4.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.522285,19.044100);
            var marker_5 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_5.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.497608,19.121300);
            var marker_6 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_6.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.445434,19.106388);
            var marker_7 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_7.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.500824,19.046705);
            var marker_8 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_8.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.497094,19.039586);
            var marker_9 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_9.setMap(Go_.map);

            var myLatlng = new google.maps.LatLng(47.489770,19.053438);
            var marker_10 = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker_10.setMap(Go_.map);
        },
        error : function ( jqXHR, textStatus, errorThrown ) {
            console.log('error');
        }
    });
};