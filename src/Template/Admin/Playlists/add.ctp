<h1 class="page-header">プレイリスト新規登録追加</h1>
<?php
	echo $this->Form->create($playlist);
	echo $this->Form->input('name');
	
	echo $this->Form->button("登録");
	echo $this->Form->end();
?>