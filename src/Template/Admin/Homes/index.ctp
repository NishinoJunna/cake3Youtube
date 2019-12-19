<?php $this->prepend('script', $this->Html->script('admin_search')); ?>
<?php $this->prepend('script', $this->Html->script('admin_comment')); ?>
<form>
				<input type="text" id="keyword" value="game" />
				<input type="button" id="btn1" value="検索" />
</form>

<div id ="homepage_container">
<h2 class="page_sub_title">Check Trend Movie</h2>
	<div class= "trend_movies_container">
	
		<?php foreach($trend_movies as $trend_movie): ?>
	
		<div class= "trend_movie_box">
			<div class ="trend_movie_details">
				<p class ="trend_movie_title"><?=h($trend_movie->title) ?></p>
			</div><!-- movie_details -->
			<p class= "check_plyalist_contents">この動画を再生</p>
		</div><!-- trend_movie_box -->
	
		<?php endforeach; ?>
	
	</div><!-- trend_movies_containe -->

	<h2 class="page_sub_title">Check Trend Playlist</h2>
		
		<?php foreach($trend_playlists as $trend_playlist): ?>
		
		<div class="trend_playlists_container">
			<div class = "playlist_box">
				<div class = "movie_count">
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
					<p class = "view"><?=$this->Html->link("動画一覧",["controller"=>"playlists","action"=>"mylist",$trend_playlist->id]) ?></p>
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
		<div id="header">
			
		</div>
		<div id="main"></div>
	</div>
 </div>
 
 <div id="play" class="play_container" style="display: none">
 			<form>    
                <input type="button" value=" < <" id="prev" />
		        <input type="button" value="再生" id="exe" />
		        <input type="button" value=" > > " id="next" />
            </form>
	<div class="left_play_container">
		<div id="player">
			
		</div>
		<div class="button_add_playlist">
			<?php
				echo $this->Form->create($movie,array("url"=>"/admin/movies/add"));
				echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>"","id"=>"videoid_add"]);
				echo $this->Form->input("title",["type"=>"hidden","value"=>"","id"=>"title_add"]);
				echo $this->Form->input("playlist_id",["options"=>$playlists,"empty"=>"プレイリストに追加","label"=>false]);
				echo "<button type=\"submit\" class=\"movie_submit\">追加する</button>";
				echo $this->Form->end();
			?>
		</div>
		<div class="comment_post_area">
			<?php
			echo $this->Form->create($comment,["id"=>"commentAdd",]); 
			echo $this->Form->input("content",["label"=>false,"type"=>"textarea","id"=>"comment", "style"=>"resize:none;", "value"=>""]); 
			echo $this->Form->input('youtube_id',['value'=>"",'type'=>'hidden',"id"=>"youtube_id"]); ?>
			
			<button type="button" id="comm">コメント</button>
		<?php	echo $this->Form->end();
		?>
		</div>
		
		
		<?php if(isset($comments)): ?>
		<?php foreach ($comments as $c): ?>
			<div class ="comment_box">
				<p class="comment_username"><?= h($c->user->name)  ?></p>
				<p class= "comment_content"><?= nl2br(h($c->content))  ?></p>
				<p class= "comment_date"><?= h($c->created_at->format("Y年m月d日H時i分")) ?>
				<hr>
			</div><!-- comment_box -->
		<?php endforeach; ?>
		<?php endif; ?>
	</div><!--left_play-container -->
	
	<div class="right_play_container">
		<h3 class="related_movies_text">関連動画</h3>
	<!-- foreachで関連動画を出す。現在は視覚イメージしやすいように、一つ一つボックス表示しています -->
		<div class= "related_movies_box">
			<p class ="thumnails">サムネイルイメージ</p>
			<div class ="movie_details">
				<p class ="movie_title">タイトル</p>
				<p class ="movie_descreption">動画詳細が来ます。動画詳細が来ます。動画詳細が来ます。</p>
			</div><!-- movie_details -->
		</div><!-- related_movies_box -->

	</div><!-- right_play_container -->
</div><!-- play_container -->
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>

