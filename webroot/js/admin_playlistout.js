var apiKey = 'AIzaSyCDVnMfyohhkKLuU5QMPvoeLZF9kK_ZBlY';
var url_string = window.location.href;
var url = new URL(url_string);
var youtube_id = url.searchParams.get("youtube_id");

var keyword = url.searchParams.get("search");
console.log(keyword);



	var datas = [];
	
	datas[0] = {"videoId": youtube_id};
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
     
	var search = function(keyword){
		
		gapi.client.setApiKey(apiKey);
		gapi.client.load('youtube', 'v3', function(){
		});
		var request = gapi.client.request({
			'path': '/youtube/v3/search',
			'params': {
				'q': keyword,
				'type': 'video',
				'part': 'snippet',
			}
		});
		var a = 1;
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
						datas[a] = {"videoId" : data.items[i].id.videoId,
	                			"title" : data.items[i].snippet.title,
	                			"description" : data.items[i].snippet.description,
	                			"snippet" : data.items[i].snippet.thumbnails.medium.url };
						a++;
						
					}
				}
			}
			console.log(datas);
			shuffle(datas);
			console.log(datas);
			for(key in datas){
				if (datas[key]["videoId"] != youtube_id){
					$('#related table').append(
							'<tr class="movie_box">' +
							'<td class="thum"><img src="' +
							datas[key]["snippet"] + '"/></td>' +
							'<td class="details">' +
							'<a href="http://localhost/cake3youtube/playlists/play?youtube_id=' + datas[key]["videoId"] + '&search=' + keyword + 
							'">' + datas[key]["title"] +'</a><br />' +
							'<span class="description">' + datas[key]["description"] +
							'</span>' +
							'</td>' +
							'</td>');
				}
				
			}
			
			var tr_tags = $("#related table tr");
            
            tr_tags.on('click',function(){
            	var rank = tr_tags.index(this);
            	current = rank;
            	//datas, current
            	
            	
            	console.log(current);
            	
            	//$('#commentAdd #youtube_id').val(datas[current]["videoId"]);
            	//player.loadVideoById(datas[current]["videoId"]);
            	
            });
		});
		console.log(datas);
		$('#loading').fadeOut();
	}
	
	 $(function(){
     	$('#btn1').on('click',admin1);
	 });
	function admin1(event){
		window.location.href = "http://localhost/cake3youtube/playlists/index?keyword=" + $("#keyword").val();
		return false;
	};
	
	function createPlayer(){
   		
   	}
	
	function onPlayerReady(event){
        event.target.playVideo();
        search(keyword);
        
        $('#commentAdd #youtube_id').val(datas[current]["videoId"]);
        //videoInfo(current);
			
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
    	
        current++;
        
        if(current >= datas.length){
           // current = 0;
        }
        //player.loadVideoById(datas[current]["videoId"]);
       // videoInfo(current);
        console.log(datas[current]["videoId"]);
        window.location.href = "http://localhost/cake3youtube/playlists/play?youtube_id=" + datas[current]["videoId"] + '&search=' + keyword;
        
}

function playPrev(){
    current--;
    if(current < 0){
        current = datas.length - 1;
    }
    console.log(datas[current]["videoId"]);
    window.location.href = "http://localhost/cake3youtube/playlists/play?youtube_id=" + datas[current]["videoId"] + '&search=' + keyword;
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	