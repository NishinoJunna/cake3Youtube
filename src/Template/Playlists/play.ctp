<?php $this->prepend('script', $this->Html->script('admin_playlistout')); ?>


 			<?php
				echo $this->Form->create($search,['type' => 'get']);
				echo $this->Form->input('keyword',["label"=>"", "id"=>"keyword", "value"=>$search]);
				echo $this->Form->button("登録",[ 'id'=>'btn1']);
				echo $this->Form->end();
			?>
			
            <form>
                <input type="button" value=" < <" id="prev" />
		        <input type="button" value="再生" id="exe" />
		        <input type="button" value=" > > " id="next" />
            </form>

<div id="play" class="play_container">
	
	<div class="left_play_container">
		<h2 class ="movie_title"></h2>	
		<div id="player">
				
		</div>
		
		
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
	

<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
   
    