<?php $this->prepend('script', $this->Html->script('admin_search')); ?>
<div id="container">
	<div id="loading"></div>
	<div id="header">
		<form>
			<input type="text" id="keyword" value="game" />
			<input type="button" id="btn1" value="検索" disabled="disabled" />
		</form>
	</div>
	<div id="main"></div>
</div>
 
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>