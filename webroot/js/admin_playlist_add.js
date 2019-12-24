$(function(){
	$('#adminPlaylistAdd').on('click',playlistAddRequest);
});

function playlistAddRequest(event){
	
	var data = $('#playlistAdd').serialize();
	console.log(data);

	$.ajax({
		url: "/cake3youtube/admin/movies/addplaylistajax",
		type: "POST",
		data: data,
		dataType: "json",
		success: successAction,
		error: errorMessage,
		});
	}
	

	function successAction(result){
		console.log(result);
	}
	function errorMessage(result){
		console.log(result);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
