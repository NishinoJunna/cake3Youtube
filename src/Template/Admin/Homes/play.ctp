<?php $this->prepend('script', $this->Html->script('admin_playlist')); ?>
 <?php $this->prepend('script', $this->Html->script('admin_comment')); ?>
 <?php $this->prepend('script', $this->Html->script('admin_search')); ?>
 			<form>
                <input type="text" id="keyword" value="Akb48" />
                <input type="submit" value="検索" id="btn1" disabled="disabled" />
                <input type="button" value=" < <" id="prev" />
		        <input type="button" value="再生" id="exe" />
		        <input type="button" value=" > > " id="next" />
            </form>
<div id="play" class="play_container">
	<div class="left_play_container">
		<div id="main_box" class="clearfix">
        	<div id="movie_title"><a></a></div>
            <div id="player" class="pull-left"></div>
            <div id="related" class="pull-left"></div>
            <div id="movie_description"></div>
        </div><!--main_box-->

		<p class="button_add_playlist">ここをクリックするとプレイリストに動画を追加</p>
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
   
    