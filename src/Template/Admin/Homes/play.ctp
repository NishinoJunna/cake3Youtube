<?php $this->prepend('script', $this->Html->script('admin_playlist')); ?>
 <?php $this->prepend('script', $this->Html->script('admin_comment')); ?>
 			<form>
                <input type="text" id="keyword" value="" />
                <input type="submit" value="検索" id="btn1" disabled="disabled" />

                <input type="button" value=" < <" id="prev" />
		        <input type="button" value="再生" id="exe" />
		        <input type="button" value=" > > " id="next" />
            </form>

<div id="play" class="play_container">
	
	<div class="left_play_container">
		<h2 class ="movie_title"></h2>	
		<div id="player">
				
		</div>
		<div class="button_add_playlist">
			<?php 
				echo $this->Form->create($movie,array("url"=>"/admin/movies/add"));
				echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>"","id"=>"videoid_add"]);
				echo $this->Form->input("title",["type"=>"hidden","value"=>"","id"=>"title_add"]);
				echo $this->Form->input("playlist_id",["options"=>$playlists,"empty"=>"プレイリストに追加","label"=>false,"class"=>"add_playlist"]);
				echo "<button type=\"submit\" class=\"movie_submit\">追加する</button>";
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
		<?php endif; ?>
	</div><!--left_play-container -->
	
	<div class="right_play_container">
		
	</div><!-- right_play_container -->
	
<?php /* ?>	<div class="right_play_container">
		<h3 class="related_movies_text">関連動画</h3>
		<div class= "related_movies_box">
			<p class ="thumnails">サムネイルイメージ</p>
			<div class ="movie_details">
				<p class ="movie_title">タイトル</p>
				<p class ="movie_descreption">動画詳細が来ます。動画詳細が来ます。動画詳細が来ます。</p>
			</div><!-- movie_details -->
		</div><!-- related_movies_box -->
	</div><!-- right_play_container -->
</div><!-- play_container --> <php */ ?>
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
   
    