<?php $this->prepend('script', $this->Html->script('admin_searchout')); ?>

			<?php
				echo $this->Form->create($search,['type' => 'get']);
				echo $this->Form->input('keyword',["label"=>"", "id"=>"keyword", "value"=>$keyword]);
				echo $this->Form->button("登録",["action"=>"index", 'id'=>'btn1']);
				echo $this->Form->end();
			?>
<div id="search">
	<div id="container">
		<div id="loading"></div>
		<div id="header"></div>
		<div id="main"></div>
	</div>
 </div>
 
 <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady" ></script>
