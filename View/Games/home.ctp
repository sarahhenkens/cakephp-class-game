<div id="game-start">
	<div style="display:inline-block;width:478px;">
	<?php
		echo $this->Html->link('Start Game', '#', array(
			'class' => 'button',
			'id' => 'start-game-button'
		));
	?>
	</div>
</div>
<div id="game-running" style="display:none;">
	<h1>Game will automatically start when you make your first guess.</h1>
	<?php echo $this->Form->text('Guess.guess', array(
		'class' => 'guess-input',
		'autocomplete' => 'off'
	));
	?>
	<div id="timer-box"><span id="timer">0</span>/60</div>
	<div id="num-correct-box">You guessed <span id="num-correct">0</span> correct classes</div>
</div>
<div id="game-finished" style="display:none;">
	<h1>You have guessed <span id="total-correct"></span> classes, good job!</h1>
	<ul id="guessed-classes"></ul>
</div>