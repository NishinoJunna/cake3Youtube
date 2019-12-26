<?php $this->prepend('script', $this->Html->script('admin_playlist')); ?>
<?php $this->prepend('script', $this->Html->script('admin_playlist_add')); ?>
<?php $this->prepend('css', $this->Html->css('movie_play')); ?>

 <?php $this->prepend('script', $this->Html->script('admin_comment')); ?>
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

<div id="play" class="play_container">
	
	<div class="left_play_container">	
		<div id="player"></div>
		<p class ="movie_title"></p>
		<div class="button_add_playlist">
			<?php 
				echo $this->Form->create($movie,["id" =>"playlistAdd"],array("url"=>"/admin/movies/addplaylistajax"));
				echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>"","id"=>"videoid_add"]);
				echo $this->Form->input("title",["type"=>"hidden","value"=>"","id"=>"title_add"]);
				echo $this->Form->input("playlist_id",["options"=>$playlists,"empty"=>"プレイリストに追加","label"=>false,"id"=>"adminPlaylistAdd","class"=>"add_playlist"]);
				echo $this->Form->end();
			?>
		</div>
		<div class="comment_post_area">
			<?php
				echo $this->Form->create($comment,["id"=>"commentAdd",]); 
				echo $this->Form->input("content",["label"=>false,"type"=>"textarea","id"=>"comment", "style"=>"resize:none;", "value"=>""]); 
				echo $this->Form->input('youtube_id',['value'=>"",'type'=>'hidden',"id"=>"youtube_id"]);
			?>
			<button type="button" id="comm" class="comment_button">コメント</button>
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
		<?php endif; ?>
	</div><!--left_play-container -->
	
	<div class="right_play_container">
		
	</div><!-- right_play_container -->
</div>

<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
   
    