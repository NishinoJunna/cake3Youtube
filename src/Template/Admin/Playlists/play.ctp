<?php $this->prepend('script', $this->Html->script('admin_playlists_play')); ?>

<?php var_dump($playlist_movies);?>


<div id= "playlist_play_container">
	<div class="player">
		
	</div>
	
	<div class= "movies_box">
		<?php foreach($playlist_movies as $playlist_movie): ?>
			<div class= "playlist_movie">
				
			</div><!-- playlist_movie -->
		<?php endforeah;?>
	</div>
	<!-- movies_box -->
</div><!-- playlist_play_container -->
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>