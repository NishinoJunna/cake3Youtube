var apiKey = 'AIzaSyAyvuTLQlXGhiqc5i85uuw9ewsMRXJkHKQ';
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
				'maxResults': 6,
				'part': 'snippet',
			}
		});
		request.execute(function(data){
			console.log(data);
			if (!data.items) return;
			$('#main').text('');
			$('.right_play_container').text('');
			$('#main').append('<div class ="right_play_container before_search_container">');
			for(var i in data.items){
				if(data.items[i].id.videoId &&
					data.items[i].id.kind=="youtube#video"){
					datas[i] = {"videoId" : data.items[i].id.videoId,
	            			"title" : data.items[i].snippet.title,
	            			"description" : data.items[i].snippet.description };
					$('.right_play_container').append(
						`<div class= "related_movies_box">
							<p class="thumnails"><img src=${data.items[i].snippet.thumbnails.default.url}></p>
							<div class ="movie_details">
								<p class ="movie_title">${data.items[i].snippet.title}
								</p>
								<p class= "publishedAt">投稿者：${data.items[i].snippet.channelTitle}</p>
							</div>
						</div>`
					);
				}
			}
			var movie_box = $(".related_movies_box");
            
            movie_box.on('click',function(){
            	var rank = movie_box.index(this);
            	current = rank;
            	console.log(current);
            	//datas, current
            	$("#search").hide();
            	$("#play").show();
            	$('#commentAdd #youtube_id').val(datas[current]["videoId"]);
            	$('.button_add_playlist #videoid_add').val(datas[current]["videoId"]);
            	$('.button_add_playlist #title_add').val(datas[current]["title"]);
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
			$("h1.page_title").hide();
			$("#homepage_container").hide();
			$("#search").show();
        	$("#play").hide();
			return false;
	};
	
	function createPlayer(){
       player = new YT.Player('player', {
           height: '400',
           width: '700',
           videoId: datas[current]['videoId'],
           events: {
               'onReady': onPlayerReady,
               'onStateChange': onPlayerStateChange,
               'onError': onPlayerError
           }
       });
       console.log($(".ytp-title-link yt-uix-sessionlink").getAttribute("href"));
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

//currentのあたり、
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	