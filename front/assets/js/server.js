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
            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker.setMap(Go_.map);
        },
        error : function ( jqXHR, textStatus, errorThrown ) {
            console.log('error');
        }
    });
};