<div id = "container">
	<h1 class="page_title">Your All Playlists</h1>
	
<?php foreach($my_playlists as $playlist) :?> 
	<div class = "playlist_box">
		<div class = "movie_count">
			<p class = "count"><span><?php echo $my_playlist->count() ;?></span></p>
		</div><!-- movie_count -->
		<div class = "description">
			<h3 class ="title"><?php echo $playlist->name ;?></h3>
			<p class = "content">
				プレイリストの説明が来ます。プレイリストの説明が来ます。プレイリストの説明が来ます。プレイリストの説明が来ます。プレイリストの説明が来ます。
				プレイリストの説明が来ます。プレイリストの説明が来ます。プレイリストの説明が来ます。プレイリストの説明が来ます。プレイリストの説明が来ます。
			</p>
		</div><!-- .description -->
		<div class = "actions">
			<p class = "edit">並び替え</p>
			<p class = "view">動画一覧</p>
		</div><!-- actions -->
	</div><!-- .playlist_box -->
<?php endforeach;?>	
</div><!-- #container -->