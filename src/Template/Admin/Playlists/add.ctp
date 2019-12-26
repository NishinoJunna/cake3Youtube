<?php $this->prepend('script', $this->Html->script('search')); ?>
<h1 class="page-header">プレイリスト新規登録追加</h1>
<?php
	echo $this->Form->create($playlist);
	echo $this->Form->input('name',["label"=>"プレイリスト名"]);
	echo $this->Form->input('description',["label"=>"説明"]);
	echo $this->Form->checkbox("status",['checked'=>false]);
	echo $this->Form->label('status',["label"=>"公開する"]);
	echo "<br>";
	echo $this->Form->button("登録");
	echo $this->Form->end();
?>