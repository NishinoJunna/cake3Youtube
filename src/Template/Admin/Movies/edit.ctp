<?php $this->prepend('script', $this->Html->script('admin_movies_edit')); ?>
<?php $this->prepend('css', $this->Html->css('admin_movies_edit')); ?>

<div id= "shuffle_movies_container">
	<div class= "shuffle_left_container">
	<?php foreach($playlist_movies as $movie) :?>
		<div class= "trend_movie_box before" id="<?= $movie->movie_detail->youtube_id?>">
			<div class ="trend_movie_details">
				<p class ="trend_movie_title"><?= $movie->movie_detail->title ?></p>
				<p class ="trend_movie_descreption">ここに動画の説明が来ますここに動画の説明が来ますここに動画の説明が来ますここに動画の説明が来ますここに動画の説明が来ます</p>
			</div><!-- movie_details -->
		</div><!-- trend_movie_box -->
	<?php endforeach ;?>
	</div><!-- shuffle_left_container -->
	<div class= "shuffle_right_container">
	<?= $this->Form->create()?>
		<?php for($i=1; $i <= $playlist_movies->count(); $i++) :?>
		
		<div class="after_shuffle_box" id="<?php echo $i;?>" value="">
		<?= $this->Form->input($i,["type"=>"hidden","value"=>"","id"=>"$i"]); ?>
		</div>
	<?php endfor ;?>
	</div><!-- shuffle_right_container -->
</div><!-- shuffle_movies_container -->
<?= $this->Form->button("登録")?>
<?= $this->Form->end?>