<?php $this->prepend('script',$this->Html->script('delete')); ?>
<div id = "container">
	<h1 class="page_title">Your All Playlists</h1>
	<div id="ask" style="display:none;">
		<p>全て削除をよろしいですか?</p>
		<input type="button" id="yes" value="はい" />&nbsp;&nbsp;<input type="button" id="non" value="いええ" />
	</div><!--ask-->

<?php $i = 0 ?>
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
			<div class="nb_box">
				<input type="hidden" id="nb<?= $i ?>" value="<?= $playlist->id ?>" />
				<input type="button" class="btn" value="プレイリストを削除する" />
			</div>
		</div><!-- actions -->
	</div><!-- .playlist_box -->

<?php $i++; endforeach;?>	
</div><!-- #container -->
