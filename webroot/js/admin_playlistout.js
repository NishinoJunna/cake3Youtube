var apiKey = 'AIzaSyCDVnMfyohhkKLuU5QMPvoeLZF9kK_ZBlY';
var url_string = window.location.href;
var url = new URL(url_string);
var youtube_id = url.searchParams.get("youtube_id");

var keyword = url.searchParams.get("search");
console.log(keyword);



	var datas = [];
	
	var googleApiClientReady = function(){
		init();
	};
	var init = function(){
		$('#btn1').attr('disabled',false);
	}
	 var videoId;
     var current = 0;
     var player;
     
     var create = new Boolean(true);
     var tag = document.createElement('script');
     tag.src = 'http://www.youtube.com/player_api';
     var firstScriptTag = document.getElementsByTagName('script')[0];
     firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
     function onYouTubePlayerAPIReady(){
    	 
    	
         player = new YT.Player('player', {
             height: '390',
             width: '640',
             videoId: youtube_id,
             events: {
                 'onReady': onPlayerReady,
                 'onStateChange': onPlayerStateChange,
                 'onError': onPlayerError
             }
         });
     }
     
     var search = function(youtube_id){
 		
 		gapi.client.setApiKey(apiKey);
 		gapi.client.load('youtube', 'v3', function(){
 		});
 		var request = gapi.client.request({
 			'path': '/youtube/v3/search',
 			'params': {
 				'relatedToVideoId':youtube_id,
 				'type': 'video',
 				'maxResults':10,
 				'part': 'snippet',
 			}
 		});
 		
 		request.execute(function(data){
 			console.log(data);
 			if (!data.items) return;
 			$('#related').text('');
 			$('#related').append('<table>');
 			for(var i in data.items){
 				if(data.items[i].id.videoId &&
 					data.items[i].id.kind=="youtube#video"){
 					console.log(data.items[i].id.videoId);
 					if(data.items[i].id.videoId != youtube_id){
 						datas[i] = {"videoId" : data.items[i].id.videoId,
 	                			"title" : data.items[i].snippet.title,
 	                			"description" : data.items[i].snippet.description };
 						$('.right_play_container').append(
 							'<tr class="movie_box">' +
 							'<td class="thum"><img src="' +
 							data.items[i].snippet.thumbnails.medium.url + '"/></td>' +
 							'<td class="details">' +
 							'<a href="http://localhost/cake3youtube/playlists/play?youtube_id=' + data.items[i].id.videoId +
 							data.items[i].snippet.title +'</a><br />' +
 							'<span class="description">' + data.items[i].snippet.description +
 							'</span>' +
 							'</td>' +
 							'</td>');
 					}
 				}
 			}
 			
 			console.log(datas);
 			
 			var tr_tags = $(".right_play_container tr");
             
             tr_tags.on('click',function(){
             	var rank = tr_tags.index(this);
             	console.log(rank);		
             	location.href = "play?youtube_id="+datas[rank]["videoId"];
             });
 		});
 		console.log(datas);
 		$('#loading').fadeOut();
 	}
 	
 	 $(function(){
      	$('#btn1').on('click',admin1);
      	$('#comm').on('click',alerting);
 	 });

 	function admin1(){
 			window.location.href = "http://localhost/cake3youtube/?keyword=" + $("#keyword").val();
 			return false;
 	};

 	function alerting(){
 		alert("コメントにはログインが必要です");
 	};
 	function createPlayer(){
    		
    	}
 	
 	function onPlayerReady(event){
         event.target.playVideo();
         $('h2.movie_title').html(event.target.getVideoData().title);
         $('.out_playlist_add').attr("href","http://localhost/cake3youtube/admin/homes/play?youtube_id="+youtube_id);
         search(youtube_id);
 			
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
         console.log(datas[0]["videoId"]);
         window.location.href = "http://localhost/cake3youtube/homes/play?youtube_id=" + datas[0]["videoId"];
         
 }

 function playPrev(){
     current--;
     if(current < 0){
         current = datas.length - 1;
     }
     console.log(datas[current]["videoId"]);
     window.location.href = "http://localhost/cake3youtube/homes/play?youtube_id=" + datas[current]["videoId"] + '&search=' + keyword;
     //videoInfo(current);
 }
 function exe(){
     if(player.getPlayerState() == YT.PlayerState.PLAYING){
         player.pauseVideo();
     }else {
         player.playVideo();
     }
 }
 	
function shuffle(array)
{
	var nb = array.lenght - 1;
    return array.sort(function() { return Math.random() - .4 });
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	