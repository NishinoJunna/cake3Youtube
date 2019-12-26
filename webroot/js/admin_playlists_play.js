var apiKey = 'AIzaSyDhDHWAYFM1P-Y39DnrXrs3ltU0Qg1YLBU';
//var apiKey = 'AIzaSyCDVnMfyohhkKLuU5QMPvoeLZF9kK_ZBlY';

var url_string = window.location.href;
var url = new URL(url_string);
if(url.searchParams.get("youtube_id")==undefined||url.searchParams.get("playlist_id")==undefined||url.searchParams.get("nb")==undefined){
	 window.location.href = "http://localhost/cake3youtube/admin/homes";
}

var googleApiClientReady = function(){
	init();
};
var init = function(){
    $('#btn').attr('disabled', false);
}
 var videoId;
 var current = 0;
 var player;
 var url_string = window.location.href;
 var url = new URL(url_string);
 var youtube_id = url.searchParams.get("youtube_id");
 var playlist_id = url.searchParams.get("playlist_id");
 var nb = url.searchParams.get("nb");
 
 
 
 
 var create = new Boolean(true);
 var tag = document.createElement('script');
 tag.src = 'http://www.youtube.com/player_api';
 var firstScriptTag = document.getElementsByTagName('script')[0];
 firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
 function onYouTubePlayerAPIReady(){
	 var movie_box = $(".movies_box");
	 movie_box.on('click',function(){
	 	var rank = movie_box.index(this) + 1;
	 	console.log(rank);
	 	youtube_id = $('#video' + rank).val();
	 	window.location.href = "http://localhost/cake3youtube/admin/playlists/play?playlist_id=" + playlist_id + "&youtube_id=" + youtube_id + "&nb=" + nb;
	 });
	 nb = $('#nb').val();
	 if(youtube_id == null || youtube_id == "" ){
		 window.location.href = "http://localhost/cake3youtube/admin/homes/index";
	 }
     player = new YT.Player('player', {
         videoId: youtube_id,
         events: {
             'onReady': onPlayerReady,
             'onStateChange': onPlayerStateChange,
             'onError': onPlayerError
         }
     });
 }
 function onPlayerReady(event){
     event.target.playVideo();
     current = $('#' + youtube_id).val();
     console.log(current);
     $('.playlist_right_container #color' + current).css("border","aqua 1rem solid");
     $('#commentAdd #youtube_id').val(youtube_id);
     /*$('h2.movie_title').html(event.target.getVideoData().title);
     search(youtube_id);*/
     $('#videoid_add').val(youtube_id);
     $('#title_add').val(event.target.getVideoData().title);
			
 }
 function onPlayerStateChange(event){
     if(event.data == YT.PlayerState.ENDED){
         playNext();
     }else if(event.data == YT.PlayerState.PLAYING) {
         $('#exe').val("停止");
     }else if(event.data == YT.PlayerState.PAUSED) {
         $('#exe').val("再生");
     }
 }

 function onPlayerError(event){
     playNext();
 }
 $(window).load(function(){
     $('#prev').on('click',function(){
         playPrev();
     });
     $('#next').on('click',function(){
         playNext();
     });
     $('#exe').on('click',function(){
         exe();
     });
 });
	
 
 function playNext(){
     current = $('#' + youtube_id).val();
     console.log(current);
     current++;
     if(current > nb){
         current = 1;
     }
     youtube_id = $('#video' + current).val();
     window.location.href = "http://localhost/cake3youtube/admin/playlists/play?playlist_id=" + playlist_id + "&youtube_id=" + youtube_id + "&nb=" + nb;
     
}

function playPrev(){
	current = $('#' + youtube_id).val();
	current--;
	if(current <= 0){
	    current = nb;
	}
	youtube_id = $('#video' + current).val();
 //console.log(datas[current]["videoId"]);
	window.location.href = "http://localhost/cake3youtube/admin/playlists/play?playlist_id=" + playlist_id + "&youtube_id=" + youtube_id + "&nb=" + nb;
 //videoInfo(current);
}
function exe(){
 if(player.getPlayerState() == YT.PlayerState.PLAYING){
     player.pauseVideo();
 }else {
     player.playVideo();
 }
}
$(function(){
 	$('#btn1').on('click',admin1);
 });

function admin1(){
		window.location.href = "http://localhost/cake3youtube/admin/homes/index?keyword=" + $("#keyword").val();
		return false;
};
