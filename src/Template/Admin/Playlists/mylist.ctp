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
			<div class="nb_box">
				<input type="hidden" id="nb<?= $i ?>" value="<?= $playlist->id ?>" />
				<input type="button" class="btn" value="プレイリストを削除" />
			</div>

		</div><!-- actions -->
	</div><!-- .playlist_box -->

<?php $i++; endforeach;?>	
</div><!-- #container -->
