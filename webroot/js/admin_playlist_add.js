$(function(){
	$("#adminPlaylistAdd").on('click',playlistAddRequest);
});

function playlistAddRequest(event){
	var data = $('#playlistAdd').serializeArray();
	console.log(data[3].value);
	if((data[3].value.length !== 0)){
	$.ajax({
		url: "/cake3youtube/admin/movies/addplaylistajax",
		type: "POST",
		data: data,
		dataType: "json",
		success: successPlaylistAddAction,
		error: errorPlaylistAddAction,
		});
	}
}
function successPlaylistAddAction(result){
	/*$("select option:first").addClass("ajax");*/
	alert("プレイリストに動画を登録しました");
	}


function errorPlaylistAddAction(result){
	alert("この動画は既にプレイリストに登録されています");
}