<?php $this->prepend('script',$this->Html->script('admin_playlists_play')); ?>
<?php $this->prepend('css', $this->Html->css('admin_playlists_play')); ?>

<div id= "playlist_play_container">
	<div class="playlist_left_container">
		<div class="player">
			<p class="test">test</p>
		</div>
	</div><!-- playlist_left_container -->
	
	
		<?php foreach($playlist_movies as $playlist_movie): ?>
			<div class= "playlist_movie" id="<?php $playlist_movie->youtube_id;?>">
			<div class="movies_box" style="background-image:url(https://i.ytimg.com/vi/<?php echo $playlist_movie->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: cover;" >
					<div class= "movie_title">
						<p><?php echo $playlist_movie->play_number;?></p>
						<p><?php echo $playlist_movie->youtube_id;?></p>
					</div><!-- movie_title -->
			</div><!-- movies_box -->
			</div><!-- playlist_movie -->
		<?php endforeach;?>
	
	
</div><!-- playlist_play_container -->
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>