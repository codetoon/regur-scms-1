function requestLoading(){
	$("#loader").removeClass("hide-loader");
    $("#loader").addClass("show-loader");
	$("#page-activity").css('opacity', '0.6');
	$('#add-btn').prop('disabled', true);
}


function success(){
	
    $('#add-btn').prop('disabled', false);
    $("#loader").removeClass("show-loader");
    $("#loader").addClass("hide-loader");
    $("#page-activity").css('opacity', '1');
}
	
/*function errors(error){
    $.each(error.errors, function(key, value){
        $('.alert-danger').show();
        $('.alert-danger').append('<p>'+value+ '</p>');
    })
}*/