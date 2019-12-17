 var apiKey="AIzaSyASdY6cKbXJm_v9EruEg1k149K4z_adWkg";
        var videoId;
        var googleApiClientReady = function(){
            init();
        }
        var init = function(){
            $('#btn').attr('disabled', false);
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
                if(!data.items) return;
                $('#main').text('');
                for(var i in data.items){
                    if(data.items[i].id.videoId &&
                    data.items[i].id.kind=="youtube#video"){
                        videoId = data.items[i].id.videoId;
                        movie = '<iframe width="560" height="315" src="https://youtube.com/embed/' + data.items[i].id.videoId + '" frameborder="0"></iframe>';
                        $('#main').append(
                            '<div id="movie_title">' +
                            '<a href="https://www.youtube.com/watch?v=' +
                            data.items[i].id.videoId + '" target="_blank">' + data.items[i].snippet.title + '</a>' +
                            '</div>' +
                            movie +
                            '<div id="movie_description">' +
                            data.items[i].snippet.description + '</div>');
                    }
                    break;  
                }
                console.log(videoId);
                search_related(keyword, videoId);
            });
        }
        var search_related = function(keyword, videoId){
            gapi.client.setApiKey(apiKey);
            gapi.client.load('youtube', 'v3', function(){
            });
            var request = gapi.client.request({
                'path': '/youtube/v3/search',
                'params': {
                    'q': keyword,
                    'type': 'video',
                    'relatedToVideoId': videoId,
                    'maxResults': 20,
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
                        $('#related table').append(
                            '<tr class="movie_box">' +
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
                $('#loading').fadeOut();
                $('#main_box').show();
            })
        };
        $(function(){
            $('#main_box').hide();
            $('form').submit(function(){
                var keyword = $('#keyword').val();
                $('#loading').fadeIn();
                search(keyword);
                return false;
            });
        });