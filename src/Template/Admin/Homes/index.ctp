<?php $this->prepend('script', $this->Html->script('admin_search')); ?>
<?php $this->prepend('css', $this->Html->css('admin_movies_view')); ?>


<div class="admin_homes_index_form">
	<h2 class= "page_title">WELCOME!!</h2>
	<?php 
		echo $this->Form->create($search,['type' => 'get']);
		echo $this->Form->input('keyword',["label"=>"", "id"=>"keyword", "value"=>$keyword]);
		echo $this->Form->button("検索",["action"=>"index", 'id'=>'btn1']);
		echo $this->Form->end();
	?>
</div>

<div id ="homepage_container">
<h3 class="page_sub_title">Check Trend Movies</h3>
	<div class= "playlist_movies_container">
		<?php foreach($trend_movies as $trend_movie): ?>
		<div class="movies">
			<div class= "movies_box"  style="background:url(https://i.ytimg.com/vi/<?php echo $trend_movie->youtube_id ?>/mqdefault.jpg); background-repeat: no-repeat;
			background-size:240px 160px;">
			</div><!-- movies_box -->
			<p class ="movie_title"><?=h($trend_movie->title) ?></p>
			<div class="link_box">
				<p class= "link"><?=$this->Html->link("この動画を再生" , "/admin/homes/play?youtube_id=$trend_movie->youtube_id") ?></p>
			</div>
		</div><!-- movies -->
		<?php endforeach; ?>
	</div><!-- playlist_movies_container -->
	
	<h3 class="page_sub_title">Check Trend Playlists</h3>
	
	<?php foreach($trend_playlists as $key => $trend_playlist): ?>
	<div class="playlist_box">
			<div class = "movie_count" style="background-image:url(https://i.ytimg.com/vi/<?php echo $first[$key]->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: 260px 180px;">
					<p class ="count"><span>件</span></p>
			</div><!-- movie_count -->
			<div class = "description">
				<h3 class ="title">【<?=h($trend_playlist->name) ?>】</h3>
				<p class = "content">
					<?=h($trend_playlist->description) ?>
				</p>
				<p class= "publishedAt">作成者：<?=$trend_playlist->user->name ?></p>
			</div><!-- .description -->
			<div class = "actions">
				<p class = "edit"><?=$this->Html->link("動画一覧",["controller"=>"movies","action"=>"view",$trend_playlist->id]) ?></p>
			</div><!-- actions -->
	</div><!-- playlist_box -->
		<?php endforeach; ?>

		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->numbers([
					'before'	=>	$this->Paginator->first("<<"),
					'after'		=>	$this->Paginator->last(">>"),
				]) ?>
			</ul>
		</div>
</div><!-- homepage_container -->


<div id="search">
	<div id="container">
		<div id="loading"></div>
		<div id="header"></div>
		<div id="main"></div>
	</div>
 </div>
 

<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady" ></script>
