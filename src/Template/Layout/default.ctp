<?php

	$this->prepend('css', $this->Html->css([
		'style.css'
	]));
	
	$this->prepend('css', $this->Html->css([
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
	]));
	
	$this->prepend('script', $this->Html->script([
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
	]));
	
	$this->prepend('script', $this->Html->script([
		'//code.jquery.com/jquery-2.2.4.js'
	]));
	
	$this->prepend('script', $this->Html->script([
		'//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'
	]));
	
?>

<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<?= $this->Html->meta('icon') ?>
	<title><?= $this->fetch('title') ?></title>
	<?= $this->fetch('script') ?>
	<?php echo $this->Html->css('style.css'); ?>
	<?= $this->fetch('css') ?>
</head>
<body>
	<?= $this->element("menu/" . $menu) ?>
	<?= $this->element("content") ?>
</body>
</html>