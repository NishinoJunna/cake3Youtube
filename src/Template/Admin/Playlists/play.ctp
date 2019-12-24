<?php $this->prepend('script',$this->Html->script('admin_playlists_play')); ?>
<?php $this->prepend('css', $this->Html->css('admin_playlists_play')); ?>
<?php $this->prepend('script', $this->Html->script('admin_comment')); ?>
<?php $this->prepend('script', $this->Html->script('admin_playlist_add')); ?>

<?php
	echo $this->Form->create($search,['type' => 'get']);
	echo $this->Form->input('keyword',["label"=>"", 'id'=>"keyword", "value"=>$search]);
	echo $this->Form->button("検索",[ 'id'=>'btn1']);
	echo $this->Form->end();
?>
			
<form>
    <input type="button" value=" < <" id="prev" />
    <input type="button" value="再生" id="exe" />
    <input type="button" value=" > > " id="next" />
</form>

<div id= "playlist_play_container">
	<div class="playlist_left_container">
		<div>
			<div id="player"></div>
		</div>
		<div class="button_add_playlist">
			<?php 
				echo $this->Form->create($movie,["id" =>"playlistAdd"],array("url"=>"/admin/movies/addplaylistajax"));
				echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>"","id"=>"videoid_add"]);
				echo $this->Form->input("title",["type"=>"hidden","value"=>"","id"=>"title_add"]);
				echo $this->Form->input("playlist_id",["options"=>$playlists,"empty"=>"プレイリストに追加","label"=>false,"id"=>"adminPlaylistAdd"]);
			
				echo $this->Form->end();
			?>
		</div>
		<div class="comment_post_area">
			<?php
				echo $this->Form->create($comment,["id"=>"commentAdd",]); 
				echo $this->Form->input("content",["label"=>false,"type"=>"textarea","id"=>"comment", "style"=>"resize:none;", "value"=>""]); 
				echo $this->Form->input('youtube_id',['value'=>"",'type'=>'hidden',"id"=>"youtube_id"]);
			?>
			<button type="button" id="comm">コメント</button>
			<?php	echo $this->Form->end();?>
		</div><!--comment_post_area-->
		
		<?php if(isset($comments)): ?>
			<div class ="comment_box">
				<?php foreach ($comments as $c): ?>
					<p class="comment_username"><?= h($c->user->name)  ?></p>
					<p class= "comment_content"><?= nl2br(h($c->content))  ?></p>
					<p class= "comment_date"><?= h($c->created_at->format("Y年m月d日H時i分")) ?></p>
					<hr>
				<?php endforeach; ?>
			</div><!-- comment_box -->
		<?php 
			endif; 
			$i = 1;
		?>
	</div><!-- playlist_left_container -->
	<div class= "playlist_right_container">
		<?php foreach($playlist_movies as $playlist_movie): ?>
			<div class="movies_box" style="background-image:url(https://i.ytimg.com/vi/<?php echo $playlist_movie->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: cover;" 
        	id="color<?php echo $i ;?>">
        	<a href="http://localhost/cake3youtube/admin/playlists/play?playlist_id=<?= $playlist_id ?>&youtube_id=<?php echo $playlist_movie->youtube_id; ?>&nb=<?php $nb ?>">
        		<?php echo $playlist_movie->youtube_id;?>
        	</a>
        	<input type="hidden" id="<?php echo $playlist_movie->youtube_id;?>" value="<?php echo $i ?>" />
        	<input type="hidden" id="video<?php echo $i;?>" value="<?php echo $playlist_movie->youtube_id; ?>" />
				<div class= "movie_title">
					<p><?php echo $playlist_movie->play_number; $i++;?></p>
				</div><!-- movie_title -->
			</div><!-- movies_box -->	
		<?php endforeach; ?>
	</div><!-- playlist_right_container-->
</div><!-- playlist_play_container -->

<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>