
<h1 class="page_title">Play Your Favorite Movie</h1>

<div id= "play_container">
	<div class="left_play_container">
		<div class="player">
			ここには再生される動画のiflameセレクタがきます
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
		<h3 class="related_movies_text">関連動画</h3>
	<!-- foreachで関連動画を出す。現在は視覚イメージしやすいように、一つ一つボックス表示しています -->
		<div class= "related_movies_box">
			<p class ="thumnails">サムネイルイメージ</p>
			<div class ="movie_details">
				<p class ="movie_title">タイトル</p>
				<p class ="movie_descreption">動画詳細が来ます。動画詳細が来ます。動画詳細が来ます。</p>
			</div><!-- movie_details -->
		</div><!-- related_movies_box -->
		
		<div class= "related_movies_box">
			<p class ="thumnails">サムネイルイメージ</p>
			<div class ="movie_details">
				<p class ="movie_title">タイトル</p>
				<p class ="movie_descreption">動画詳細が来ます。動画詳細が来ます。動画詳細が来ます。</p>
			</div><!-- movie_details -->
		</div><!-- related_movies_box -->
		
		<div class= "related_movies_box">
			<p class ="thumnails">サムネイルイメージ</p>
			<div class ="movie_details">
				<p class ="movie_title">タイトル</p>
				<p class ="movie_descreption">動画詳細が来ます。動画詳細が来ます。動画詳細が来ます。</p>
			</div><!-- movie_details -->
		</div><!-- related_movies_box -->
		
		<div class= "related_movies_box">
			<p class ="thumnails">サムネイルイメージ</p>
			<div class ="movie_details">
				<p class ="movie_title">タイトル</p>
				<p class ="movie_descreption">動画詳細が来ます。動画詳細が来ます。動画詳細が来ます。</p>
			</div><!-- movie_details -->
		</div><!-- related_movies_box -->
	</div><!-- right_play_container -->
</div><!-- play_container -->
