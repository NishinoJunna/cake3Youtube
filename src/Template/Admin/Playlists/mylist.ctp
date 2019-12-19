<div id = "container">
	<h1 class="page_title">Your All Playlists</h1>
	
<?php// foreach($my_playlists as $playlist) :?> 
	<div class = "playlist_box">
		<div class = "movie_count">
			<p class = "count"><span><?=  h($my_playlists->count())?></span></p>
		</div><!-- movie_count -->
		<div class = "description">
			<h3 class ="title"><?=  h($playlist->name) ?></h3>
			<p class = "content">
				<?= h($playlist->descreption) ?>
			</p>
		</div><!-- .description -->
		<div class = "actions">
			<p class = "edit"><?= $this->HTML->link("並び替え",["action"=>"edit"],$playlist->id)?></p>
			<p class = "view"><?= $this->HTML->link("動画一覧",["action"=>"view"])?></p>
		</div><!-- actions -->
	</div><!-- .playlist_box -->
<?php //endforeach;?>	
</div><!-- #container -->

<!-- 西野さんがプレイリストに動画を保存できるようにしたら、作動できる（12月19日11時AM） -->