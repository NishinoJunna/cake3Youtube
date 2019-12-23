<?php $this->prepend('script', $this->Html->script('admin_search')); ?>

	<?php 
				echo $this->Form->create($search,['type' => 'get']);
				echo $this->Form->input('keyword',["label"=>"", "id"=>"keyword", "value"=>$keyword]);
				echo $this->Form->button("登録",["action"=>"index", 'id'=>'btn1']);
				echo $this->Form->end();
			?>
<!--
<form action="index" method="get">
				<input type="text" id="keyword" value="" />
				<input type="button" id="btn1" value="検索" />
</form> -->

<div id ="homepage_container">
<h2 class="page_sub_title">Check Trend Movie</h2>
	<div class= "trend_movies_container">
	
		<?php foreach($trend_movies as $trend_movie): ?>
	
		<div class= "trend_movie_box"  style="background:url(https://i.ytimg.com/vi/<?php echo $trend_movie->youtube_id ?>/default.jpg); background-repeat: no-repeat;
		background-size:contain;">
			<div class ="trend_movie_details">
				<p class ="trend_movie_title"><?=h($trend_movie->title) ?></p>
			</div><!-- movie_details -->
			<a href="http://localhost/cake3youtube/admin/homes/play?youtube_id=<?php echo $trend_movie->youtube_id ?>" /><p class= "check_plyalist_contents">動画を再生</p></a>
		</div><!-- trend_movie_box -->
	
		<?php endforeach; ?>
	
	</div><!-- trend_movies_containe -->

	<h2 class="page_sub_title">Check Trend Playlist</h2>
		
		<?php foreach($trend_playlists as $key => $trend_playlist): ?>
		
		<div class="trend_playlists_container">
			<div class = "playlist_box">
				<div class = "movie_count" style="background-image:url(https://i.ytimg.com/vi/<?php echo $first[$key]->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: cover;">
					<p class = "count"><span>動画件数</span></p>
				</div><!-- movie_count -->
				<div class = "description">
					<h3 class ="title"><?=h($trend_playlist->name) ?></h3>
					<p class = "content">
						<?=h($trend_playlist->description) ?>
					</p>
					<p class= "publishedAt">作成者：<?=$trend_playlist->user->name ?></p>
				</div><!-- .description -->
				<div class = "actions">
					<p class = "view"><?=$this->Html->link("動画一覧",["controller"=>"movies","action"=>"view",$trend_playlist->id]) ?></p>
				</div><!-- actions -->
			</div><!-- .playlist_box -->
		</div><!-- trend_playlists_container -->
		
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
