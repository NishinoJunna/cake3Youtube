 var playlist = [];
        var datas = [];
        var create = new Boolean(true);
        var apiKey="AIzaSyDhDHWAYFM1P-Y39DnrXrs3ltU0Qg1YLBU";
        var videoId;
        var current = 0;
        var player;
        
        var tag = document.createElement('script');
        tag.src = 'http://www.youtube.com/player_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        
        var googleApiClientReady = function(){
            init();
        }
        var init = function(){
            $('#btn').attr('disabled', false);
        }
        
        var search = function(keyword){
        	current = -1;
            gapi.client.setApiKey(apiKey);
            gapi.client.load('youtube', 'v3', function(){
            });
            var request = gapi.client.request({
                'path': '/youtube/v3/search',
                'params': {
                    'q': keyword,
                    'type': 'video',
                    'maxResults': 4,
                    'part': 'snippet',
                }
            });
            request.execute(function(data){
            	console.log(data);
                $('#related').text('');
                $('#related').append('<table>');
                for(var i in data.items){
                    if(data.items[i].id.videoId &&
                    data.items[i].id.kind=="youtube#video"){
                        datas[i] = {"videoId" : data.items[i].id.videoId,
                        			"title" : data.items[i].snippet.title,
                        			"description" : data.items[i].snippet.description };
                       
                        $('#related table').append(
                            '<tr class="movie_box" id="' + data.items[i].id.videoId +'">' +
                            '<td class="thum">' +
                            '<a href="https://www.youtube.com/watch?v=' +
                            data.items[i].id.videoId + '" target="_blank">' +
                            '<img src="' + data.items[i].snippet.thumbnails.default.url +
                            '"/>' +
                            '</a>' +
                            '</td>' +
                            '<td class="details">' + data.items[i].snippet.title + '<br />' +
                            '<span class="description">' + '' + '</span>' +
                            '</td>' +
                            '</tr>');
                    }
                }
                
                var tr_tags = $("#related table tr");
                
                tr_tags.on('click',function(){
                	var rank = tr_tags.index(this);
                	current = rank -1;
                	console.log(current);
                	playNext();
                });

                
                $('#loading').fadeOut();
                $('#main_box').show();
         		console.log(datas);
         		if (create){
         			create = false;
         			createPlayer();
         		}   
            })
        };
        $(function(){
        	$('#btn').on('click',admin);
        });
        function admin(event){
        	//alert('b');
            $('#main_box').hide();
            var keyword = $('#keyword').val();
            $('#loading').fadeIn();
            search(keyword);
            return false;
          
        };
			
       		function videoInfo(current){
       			$('#movie_title a').attr('href', 'https://www.youtube.com/watch?v=' + datas[current]["videoId"]).attr('target', "_blank").text(datas[current]["title"]);
       			$('#movie_description').text(datas[current]["description"]);
				
       			$('#related table tr').css("background-color","white");
       			$('#' + datas[current]['videoId']).css("background-color","red");
       		}	
        
            function playNext(){
            	
                    current++;
                    
                    if(current >= datas.length){
                        current = 0;
                    }
                    player.loadVideoById(datas[current]["videoId"]);
                    videoInfo(current);
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

           	function onYouTubePlayerAPIReady(){
            }
            
           	function createPlayer(){
           		current = 0;
               player = new YT.Player('player', {
	               height: '390',
	               width: '640',
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
                videoInfo(current);
       			
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
       