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

    jQuery('body').on('click', '.settings', function(e){

        e.preventDefault();

        var model = jQuery(this).find('button').attr('id');
        var action = 'open_modal/';

        jQuery.ajax({
            url : action,
            type : "POST",
            data : "action=" + action + "&model=" + model,
            dataType : 'json',
            success : function( res ) {
                console.log('success');
            },
            error : function ( jqXHR, textStatus, errorThrown ) {
                console.log('error');
            }
        });

    });
});