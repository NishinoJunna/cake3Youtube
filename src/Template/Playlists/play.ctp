<?php $this->prepend('script', $this->Html->script('admin_playlistout')); ?>
 <?php $this->prepend('script', $this->Html->script('admin_comment')); ?>

 			<?php
				echo $this->Form->create($search,['type' => 'get']);
				echo $this->Form->input('keyword',["label"=>""]);
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
		<div id="main_box" class="clearfix">
        	<div id="movie_title"><a></a></div>
            <div id="player" class="pull-left"></div>
            <div id="related" class="pull-left"></div>
            <div id="movie_description"></div>
        </div><!--main_box-->

		<div class="comment_post_area">
			<?php
				echo $this->Form->create($comment,["id"=>"commentAdd",'url' => array('controller' => 'Users', 'action' => 'login')]); 
				echo $this->Form->input("content",["label"=>false,"type"=>"textarea","id"=>"comment", "style"=>"resize:none;", "value"=>""]); 
				echo $this->Form->input('youtube_id',['value'=>"",'type'=>'hidden',"id"=>"youtube_id"]);
				echo $this->Form->button("登録");
				echo $this->Form->end();
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
	

<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
   
    