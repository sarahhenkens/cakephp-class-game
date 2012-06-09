<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

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
		}

		#new-game-container {
			text-align:center;
		}

		#new-game-container > h1 {
			font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
			font-size: 35px;
			line-height: 35px;
			position: relative;
			font-weight: 400;
			color: rgba(27,54,81,0.8);
			text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			padding: 0px 0px 5px 0px;
		}

		#new-game-container > h1 > span {
			color: #008dc1;
			text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
		}

		#game-container {
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
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
