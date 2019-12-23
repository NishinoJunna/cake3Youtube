<div id = "container">
	<h1 class="page_title">Your All Playlists</h1>


<?php foreach($my_playlists as $playlist) :?> 
	<div class = "playlist_box">
		<div class = "movie_count">
			<p class = "count"><span><?=  h(count($playlist->movies))?></span></p>
		</div><!-- movie_count -->
		<div class = "description">
			<h3 class ="title">【<?=  h($playlist->name) ?>】</h3>
			<p class = "content">
				<?= h($playlist->description) ?>
			</p>
			
		</div><!-- .description -->
		<div class = "actions">
			<p class = "edit"><?=$this->html->link("変更",["action"=>"edit",$playlist->id]) ?></p>
			<p class ="edit"><?= $this->Html->link("並び替え",["controller"=>"Movies","action"=>"edit",$playlist->id])?></p>
			<p class ="edit"><?= $this->Html->link("動画一覧",["controller"=>"Movies","action"=>"view",$playlist->id])?></p>
			<p>
				<?=$this->Html->link("プレイリストを削除する",["action"=>"delete",$playlist->id]) ?>
			</p>
		</div><!-- actions -->
	</div><!-- .playlist_box -->
<?php endforeach;?>	
</div><!-- #container -->
