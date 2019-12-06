$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});

	$('#language').on('click', function(e){
		e.preventDefault();
			var url = 'settings';
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

    $('body').on('click', '#save_language', function(e){
        $('#showModal').modal('hide');
    });

});
