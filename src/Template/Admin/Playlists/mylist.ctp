<div id = "container">
	<h1 class="page_title">Your All Playlists</h1>



<?php foreach($my_playlists as $playlist) :?> 	
	<div class = "playlist_box">
		<?php if(!empty($playlist->movies[0]->youtube_id)): ?>
		<div class = "movie_count" style="background-image:url(https://i.ytimg.com/vi/<?php echo $playlist->movies[0]->youtube_id;?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: 260px 180px;">
        <?php else: ?>
        <div class = "movie_count">
        <?php endif; ?>
			<p class = "count"><span><?=  h(count($playlist->movies))?></span></p>
		</div><!-- movie_count -->
		<div class = "description">
			<h3 class ="title">【<?=  h($playlist->name) ?>】</h3>
			<p class = "content">
				<?= h($playlist->description) ?>
			</p>
			
		</div><!-- .description -->
		<div class = "actions">
			<p class ="edit"><?=$this->html->link("変更",["action"=>"edit",$playlist->id]) ?></p>
			<p class ="edit"><?= $this->Html->link("順番",["controller"=>"Movies","action"=>"edit",$playlist->id])?></p>
			<p class ="edit"><?= $this->Html->link("一覧",["controller"=>"Movies","action"=>"view",$playlist->id])?></p>
			<p class ="edit">
				<?=$this->Html->link("削除	",["action"=>"delete",$playlist->id]) ?>
			</p>
		</div><!-- actions -->
	</div><!-- .playlist_box -->
<?php endforeach;?>	
</div><!-- #container -->
