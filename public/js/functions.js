

function showLoader(){
	$("#loader").removeClass("hide-loader");
    $("#loader").addClass("show-loader");
	$("#page-activity").css('opacity', '0.6');
}


function hideLoader(){
    $("#loader").removeClass("show-loader");
    $("#loader").addClass("hide-loader");
    $("#page-activity").css('opacity', '1');
}

$(document).ready(function(){
	feather.replace();
})