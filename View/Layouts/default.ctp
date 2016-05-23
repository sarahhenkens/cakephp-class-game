<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
		<title>
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			'reset',
			'game'
		));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->script(array(
			'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
			'game'
		));
	?>
</head>
<body>

	<header>
		<?php echo $this->Html->image('cakephp-framework.png', array('id' => 'logo-image')); ?>
		<div id="title"><h1>How many <span>CakePHP classes</span> do you know in 60 seconds?</h1></div>
		<div class="header-backing"></div>
	</header>

	<div id="content">
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<div id="footer">

	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
