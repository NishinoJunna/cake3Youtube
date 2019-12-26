<?php $this->prepend('script', $this->Html->script('searchout')); ?>
<?php $this->prepend('script', $this->Html->script('admin_movies_view')); ?>
<?php $this->prepend('css', $this->Html->css('admin_movies_view')); ?>

<h2 class="page_title"><?php echo $playlist->name;?></h2>
<?php $nb = count($movies); ?>
<p class="playlist_play_link">
	<a href="http://localhost/cake3youtube/playlists/playlist?playlist_id=<?= $playlist_id ?>&youtube_id=<?= $movi->movie_detail->youtube_id ?>&nb=<?= count($movies) ?>">
		このプレイリストを再生
	</a>
</p>
<div class="playlist_movies_container">
	<?php foreach($movies as $movie) :?>
	<div class="movies">
		<div class="movies_box" style="background-image:url(https://i.ytimg.com/vi/<?php echo $movie->movie_detail->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: 240px 160px;" >
        	<p class= "play_number"><?php echo $movie->play_number;?></p>
        </div><!-- movie_box -->
        <p class= "movie_title"><?php echo $movie->movie_detail->title;?></p>
		<div class ="link_box">
			<p class= "link"><a href="http://localhost/cake3youtube/playlists/playlist?playlist_id=<?= $playlist_id ?>&youtube_id=<?= $movie->youtube_id ?>&nb=">
				この動画から再生
			</a></p>
		</div><!-- link_box -->
	</div><!-- movies -->
	<?php endforeach ;?>
</div><!-- playlist_movies_container -->