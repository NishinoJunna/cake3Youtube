<?php
echo $this->Form->create($comment); 
echo $this->Form->textarea("content",["label"=>false,"type"=>"textarea","id"=>"comment", "style"=>"resize:none;", "value"=>""]);
echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>2]);
echo $this->Form->button("コメント");
echo $this->Form->end();
?>

<div id="comment_contents">
<table id="c_table">
<?php if(isset($comments)): ?>
<?php foreach ($comments as $c): ?>
	<tr><td><?= h($c->user->name)  ?></td></tr>
	<tr class="c_content"><td><?= nl2br(h($c->content))  ?></td></tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
</div>

