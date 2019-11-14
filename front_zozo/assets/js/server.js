jQuery(document).ready(function(){
    console.log(1);

    jQuery('body').on('click', '.terms-conditions', function(){
        if( jQuery('.menu-drop-terms-conditions').hasClass('menu-undrop') )
            jQuery('.menu-drop-terms-conditions').removeClass('menu-undrop').addClass('menu-drop');
        else
            jQuery('.menu-drop-terms-conditions').removeClass('menu-drop').addClass('menu-undrop');
    });

    jQuery('body').on('click', '.download-app', function(){
        if( jQuery('.menu-drop-download-app').hasClass('menu-undrop') )
            jQuery('.menu-drop-download-app').removeClass('menu-undrop').addClass('menu-drop');
        else
            jQuery('.menu-drop-download-app').removeClass('menu-drop').addClass('menu-undrop');
    });

    jQuery('body').on('click', '.showmodal', function(e){

        e.preventDefault();

        var url = jQuery(this).data('action');
        // var modal = jQuery(this).data('id');

        jQuery.ajax({
            url: url,
            data : "action=" + url + "/read",
            type: 'POST',
            dataType : 'json',
            success : function( res ) {
                console.log('success');
                $('#myModal').modal('show'); 
            },
            error : function ( jqXHR, textStatus, errorThrown ) {
                console.log('error');

            }
        });
    });
});