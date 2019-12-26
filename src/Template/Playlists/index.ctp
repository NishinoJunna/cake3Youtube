<?php $this->prepend('script', $this->Html->script('admin_searchout')); ?>
<?php $this->prepend('css', $this->Html->css('admin_movies_view')); ?>
<h1 class= "page_title">Welcome!!</h1>

<div id ="homepage_container">
<h2 class="page_sub_title">Check Trend Movies</h2>
	<div class= "playlist_movies_container">
		<?php foreach($trend_movies as $trend_movie): ?>
		<div class="movies">
			<div class= "movies_box"  style="background:url(https://i.ytimg.com/vi/<?php echo $trend_movie->youtube_id ?>/mqdefault.jpg); background-repeat: no-repeat;
			background-size:240px 160px;">
			</div><!-- movies_box -->
			<p class ="movie_title"><?=h($trend_movie->title) ?></p>
			<div class="link_box">
				<p class= "link"><a href="http://localhost/cake3youtube/playlists/play?youtube_id=<?php echo $trend_movie->youtube_id ?>" >動画を再生</a></p>
			</div><!-- link_box -->
		</div><!-- movies -->
		<?php endforeach; ?>
	</div><!-- playlist_movies_containe -->

	<h2 class="page_sub_title">Check Trend Playlists</h2>
		
		<?php foreach($trend_playlists as $key => $trend_playlist): ?>
		
		<div class="trend_playlists_container">
			<div class = "playlist_box">
				<div class = "movie_count" style="background-image:url(https://i.ytimg.com/vi/<?php echo $first[$key]->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: cover;">
					<p class = "count"><span><?=  h(count($trend_playlist->movies))?></span></p>
				</div><!-- movie_count -->
				<div class = "description">
					<h3 class ="title"><?=h($trend_playlist->name) ?></h3>
					<p class = "content">
						<?=h($trend_playlist->description) ?>
					</p>
					<p class= "publishedAt">作成者：<?=$trend_playlist->user->name ?></p>
				</div><!-- .description -->
				<div class = "actions">
					<p class = "edit"><?=$this->Html->link("一覧",["controller"=>"playlists","action"=>"view",$trend_playlist->id]) ?></p>
					<p class = "edit">
						<a href="http://localhost/cake3youtube/playlists/playlist?playlist_id=<?= $trend_playlist->id ?>&youtube_id=<?php echo $first[$key]->youtube_id ?>&nb=">
							再生
						</a>
					</p>
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
