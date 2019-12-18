var apiKey = 'AIzaSyDhDHWAYFM1P-Y39DnrXrs3ltU0Qg1YLBU';
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
		request.execute(function(data){
			console.log(data);
			if (!data.items) return;
			$('#main').text('');
			$('#main').append('<table>');
			for(var i in data.items){
				if(data.items[i].id.videoId &&
					data.items[i].id.kind=="youtube#video"){
					datas[i] = {"videoId" : data.items[i].id.videoId,
                			"title" : data.items[i].snippet.title,
                			"description" : data.items[i].snippet.description };
					console.log(data.items[i].id.videoId);
					$('#main table').append(
						'<tr class="movie_box">' +
						'<td class="thum"><img src="' +
						data.items[i].snippet.thumbnails.medium.url + '"/></td>' +
						'<td class="details">' +
						'<a href="https://www.youtube.com/watch?=v' + data.items[i].id.videoId +
						'" target="_blank">' + data.items[i].snippet.title +'</a><br />' +
						'<span class="description">' + data.items[i].snippet.description +
						'</span>' +
						'</td>' +
						'</td>');
				}
			}
			var tr_tags = $("#main table tr");
            
            tr_tags.on('click',function(){
            	var rank = tr_tags.index(this);
            	current = rank -1;
            	//datas, current
            	$("#search").hide();
            	console.log(current);
            	$("#play").show();
            	$('#commentAdd #youtube_id').val(datas[current]["videoId"]);
            	if (create){
         			create = false;
         			createPlayer();
         		}else{
         			playNext();
         		} 
            	
            });
		});
		console.log(datas);
		$('#loading').fadeOut();
	}
	 $(function(){
     	$('#btn1').on('click',admin1);
	 });
	function admin1(event){
			
			var keyword = $('#keyword').val();
			$('#loading').fadeIn();
			search(keyword);
			$("#search").show();
        	$("#play").hide();
			return false;
	};
	
	function createPlayer(){
   		current = 0;
       player = new YT.Player('player', {
           //height: '400',
           //width: '700',
           videoId: datas[current]['videoId'],
           events: {
               'onReady': onPlayerReady,
               'onStateChange': onPlayerStateChange,
               'onError': onPlayerError
           }
       });
   	}
	
	function onPlayerReady(event){
        event.target.playVideo();
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
            current = 0;
        }
        player.loadVideoById(datas[current]["videoId"]);
       // videoInfo(current);
}

function playPrev(){
    current--;
    if(current < 0){
        current = datas.length - 1;
    }
    player.loadVideoById(datas[current]["videoId"]);
    videoInfo(current);
}
function exe(){
    if(player.getPlayerState() == YT.PlayerState.PLAYING){
        player.pauseVideo();
    }else {
        player.playVideo();
    }
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	