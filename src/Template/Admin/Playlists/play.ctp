<?php $this->prepend('script',$this->Html->script('admin_playlists_play')); ?>
<?php $this->prepend('css', $this->Html->css('admin_playlists_play')); ?>

<div id= "playlist_play_container">
	<div class="playlist_left_container">
		<div class="player">
			<p class="test">test</p>
		</div>
	</div><!-- playlist_left_container -->
	
	<div class= "movies_box">
		<?php foreach($playlist_movies as $playlist_movie): ?>
			<div class= "playlist_movie" id="<?php echo $playlist_movie->play_number;?>">
				<div class= "movie_title">
					<p><?php echo $playlist_movie->play_number;?></p>
					<p><?php echo $playlist_movie->youtube_id;?></p>
				</div><!-- movie_title -->
			</div><!-- playlist_movie -->
		<?php endforeach;?>
	</div>
	<!-- movies_box -->
</div><!-- playlist_play_container -->
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>