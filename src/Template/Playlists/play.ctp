<?php $this->prepend('script', $this->Html->script('admin_playlistout')); ?>
<?php $this->prepend('css', $this->Html->css('movie_play')); ?>
<?php $this->prepend('script', $this->Html->script('searchout')); ?>			

            <form>
                <input type="button" value=" < <" id="prev" />
		        <input type="button" value="再生" id="exe" />
		        <input type="button" value=" > > " id="next" />
            </form>

<div id="play" class="play_container">
	<div class="left_play_container">	
		<div id="player">
		</div><!-- player -->
		<p class ="movie_title"></p>
		<div class="button_add_playlist link_add_before_login">
		<?=$this->Html->link("ログインしてプレイリストに追加する","#",["class"=>"out_playlist_add"]) ?>
		</div>
		
		<div class="comment_post_area">
			<?php
				echo $this->Form->input("content",["label"=>false,"id"=>"comment", "style"=>"resize:none;", "value"=>""]); 
				echo $this->Form->input('youtube_id',['value'=>"",'type'=>'hidden',"id"=>"youtube_id"]);
			?>
			<button type="button" id="comm" class= "comment_button">コメント</button>
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
</div><!-- play_container -->
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
   
    