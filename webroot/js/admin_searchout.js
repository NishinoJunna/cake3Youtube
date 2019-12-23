var apiKey = 'AIzaSyAyvuTLQlXGhiqc5i85uuw9ewsMRXJkHKQ';
	var datas = [];
	
	var googleApiClientReady = function(){
		init();
		 if(keyword != null && keyword != ""){
			 console.log(keyword);
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
     var current = 0;
     
    
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
			var url_string = window.location.href;
			var url = new URL(url_string);
			keyword = url.searchParams.get("keyword");
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
							'<a href="http://localhost/cake3youtube/playlists/play?youtube_id=' + data.items[i].id.videoId + '&search=' + keyword + 
							'">' + data.items[i].snippet.title +'</a><br />' +
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
	            	
	            	console.log(current);
	            	
	            	//$('#commentAdd #youtube_id').val(datas[current]["videoId"]);
	            });
			});
			console.log(datas);
			$('#loading').fadeOut();
		};

     
	 /*$(function(){
     	$('#btn1').on('click',admin1);
	 });
	function admin1(event){
			
			var keyword = $('#keyword').val();
			$('#loading').fadeIn();
			search(keyword);
			return false;
	};*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	