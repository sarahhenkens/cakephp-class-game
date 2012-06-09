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
	<style type="text/css">
		body {
			background: url('/img/wall4.png');
			margin: 0;
			padding: 0;
		}

		header {
			text-align:center;
			padding:20px;
			/*background: #417282;*/
		}

		header > h1 {
			font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
			font-size: 35px;
			line-height: 35px;
			position: relative;
			font-weight: 400;
			color: rgba(27,54,81,0.8);
			text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			padding: 0px 0px 5px 0px;
		}

		header > h1 > span {
			color: #008dc1;
			text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
		}

		#game-running, #game-finished, #game-start {
			text-align:center;
		}

		.guess-input {
			height:74px;
			font-size:60px;
			padding:5px;
			width:40%;
			text-align:center;
			height:85px;
		}

		#game-start {
			padding-top:3Opx;
		}
	</style>
</head>
<body>
	<header>
		<h1>How many <span>CakePHP classes</span> do you know in 60 seconds?</h1>
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
