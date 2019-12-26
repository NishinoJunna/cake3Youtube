<?php $this->prepend('script', $this->Html->script('search')); ?>
<?php $this->prepend('script', $this->Html->script('admin_movies_edit')); ?>
<?php $this->prepend('css', $this->Html->css('admin_movies_edit')); ?>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>


<div id= "shuffle_movies_container">
<?php if(!empty($playlist_movies->toArray())): ?>
	<?= $this->Form->create()?>
	<h3>☞左上から横に順番になっています</h3>
	<div class= "shuffle_left_container">
	<?php foreach($playlist_movies as $movie) :?>
		<div class="wraped" id="<?= $movie->movie_detail->youtube_id?>">
			<div class= "movies_box" 
				style="background:url(https://i.ytimg.com/vi/<?php echo $movie->youtube_id ?>/mqdefault.jpg); background-repeat: no-repeat;
				background-size:240px 160px;">
				<p class="number"><?=$movie->play_number?></p>
			</div><!-- trend_movie_box -->
			<div class ="trend_movie_details">
					<p class ="movie_title"><?= $movie->movie_detail->title ?></p>
			</div><!-- movie_details -->
		</div>
	<?php endforeach ;?>
	</div><!-- shuffle_left_container -->
</div><!-- shuffle_movies_container -->
	<?= $this->Form->input("newnumber",["type"=>"hidden","value"=>"","id"=>"result"]); ?>
	<?= $this->Form->button("保存",["class"=>"submit"])?>
	<?= $this->Form->end?>

<?php endif; ?>



<?php /* <div id= "shuffle_movies_container">
	<div class= "shuffle_left_container">
	<?php foreach($playlist_movies as $movie) :?>
		<div class= "trend_movie_box before" id="<?= $movie->movie_detail->youtube_id?>">
			<div class ="trend_movie_details">
				<p class ="trend_movie_title"><?= $movie->movie_detail->title ?></p>
			
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
<?= $this->Form->end?>   */ ?>