<?php $this->prepend('script', $this->Html->script('admin_search')); ?>
	<form>
				<input type="text" id="keyword" value="game" />
				<input type="button" id="btn1" value="検索" />
			</form>
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
		<p class="button_add_playlist">ここをクリックするとプレイリストに動画を追加</p>
		<div class="comment_post_area">
			<?php
			echo $this->Form->create($comment); 
			echo $this->Form->textarea("content",["label"=>false,"type"=>"textarea","id"=>"comment", "style"=>"resize:none;", "value"=>""]);
			echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>2]);
			echo $this->Form->button("コメント");
			echo $this->Form->end();
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
	
	</div><!-- right_play_container -->
	
</div><!-- play_container -->
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>