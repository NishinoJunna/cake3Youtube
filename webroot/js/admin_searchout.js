var apiKey = 'AIzaSyDhDHWAYFM1P-Y39DnrXrs3ltU0Qg1YLBU';
	var datas = [];
	
	var googleApiClientReady = function(){
		init();
		 if(keyword != null && keyword != ""){
			 console.log(keyword);
			 $("h1.page_title").hide();
			$("#homepage_container").hide();
	    	 search(keyword);
	     }
	};
	var keyword = "";
	var url_string = window.location.href;
	var url = new URL(url_string);
	keyword = url.searchParams.get("keyword");
	console.log(keyword);
	var init = function(){
		$('#btn1').attr('disabled',false);
	}
	 var videoId;
     

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
            	console.log(rank);
            	$("#search").hide();
            	
            	window.location.href = 'http://localhost/cake3youtube/admin/homes/play?youtube_id='+datas[rank]["videoId"]+'&search='+keyword;
            	
            });
		});
		console.log(datas);
		$('#loading').fadeOut();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	