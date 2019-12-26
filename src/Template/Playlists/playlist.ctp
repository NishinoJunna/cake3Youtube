<?php $this->prepend('script',$this->Html->script('admin_play_out')); ?>
<?php $this->prepend('css', $this->Html->css('admin_playlists_play')); ?>

<input type="hidden" id="nb" value="<?= $nb ?>" />	
<form>
    <input type="button" value=" < < " id="prev"/>
    <input type="button" value="再生" id="exe" />
    <input type="button" value=" > > " id="next" />
</form>

<div id= "playlist_play_container">
	<div class="playlist_left_container">
		<div>
			<div id="player"></div>
		</div>
		<div class="button_add_playlist">
			<?=$this->Html->link("ログインしてプレイリストに追加する","#",["class"=>"out_playlist_add"]) ?>
		</div><!-- button_add_playlist-->
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
				<?php endforeach; ?>
			</div><!-- comment_box -->
		<?php 
			endif; 
			$i = 1;
		?>
	</div><!-- playlist_left_container -->
	<div class= "playlist_right_container">
		<?php foreach($playlist_movies as $playlist_movie): ?>
		<div class="flex_box">
			<div class="movies_box" style="background-image:url(https://i.ytimg.com/vi/<?php echo $playlist_movie->youtube_id ?>/mqdefault.jpg);
        	background-repeat: no-repeat;
        	background-size: 100%;" 
        	id="color<?php echo $i ;?>">
        	</div><!-- movies_box -->
        	<div class="flex_right_box">
	        	<p class= "movie_title"><a href="http://localhost/cake3youtube/admin/playlists/play?playlist_id=<?= $playlist_id ?>&youtube_id=<?php echo $playlist_movie->youtube_id; ?>&nb=<?php $nb ?>">
	        		<?php echo $playlist_movie->movie_detail->title;?>
	        	</a></p>			
			</div><!-- flex_right_box -->
			<input type="hidden" id="<?php echo $playlist_movie->youtube_id;?>" value="<?php echo $i ?>" />
        	<input type="hidden" id="video<?php echo $i;?>" value="<?php echo $playlist_movie->youtube_id; ?>" />
		</div><!-- flex_box -->	
		<?php $i++; endforeach; ?>
	</div><!-- playlist_right_container-->
</div><!-- playlist_play_container -->

<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>