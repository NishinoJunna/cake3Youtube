<?php $this->prepend('script', $this->Html->script('admin_movies_view')); ?>
<?php $this->prepend('css', $this->Html->css('admin_movies_view')); ?>

<h2 class="page_title">Your Playlist's Movies</h2>
<div class="playlist_movies_container">

	<?php foreach($movies as $movie) :?>		
		<div class="movies_box" style="background-image:url(https://i.ytimg.com/vi/<?php echo $movie->movie_detail->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: cover;" >
        <div class= "title_box">
			<p class= "movie_title"><?php echo $movie->movie_detail->title;?></p>
			<p class= "play_number"><?php echo $movie->play_number;?></p>
		</div>
		</div><!-- movie_box -->
	<?php endforeach ;?>
</div><!-- movies_container -->
<a href="http://localhost/cake3youtube/admin/playlists/play?playlist_id=<?= $playlist_id ?>&youtube_id=<?= $movi->movie_detail->youtube_id ?>&nb=<?= count($movies) ?>">
	このプレイリストを再生
</a>
