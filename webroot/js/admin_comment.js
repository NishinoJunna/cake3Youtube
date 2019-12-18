$(function(){
	$('#comm').on('click',commentRequest);
});

function commentRequest(event){
	//$('#loading').fadeIn();
	adminOrderEditFormInit();
	var data = $('#commentAdd').serialize();
	//var data = $('#commentAdd').serialize();
	console.log(data);
	$.ajax({
		url: "/cake3youtube/admin/comments/addCommentAjax",
		type: "POST",
		data: data,
		dataType: "json",
		success: successAction,
		error: errorMessage,
	});
	function adminOrderEditFormInit(){
		$('#message').remove();
		$('.help-block').remove();
		$('.form-group').removeClass('has-error');
	}
	function successAction(result){
		console.log(result);
	}
	
	function errorMessage(result){
		console.log(result);
	}
}