<style>
	#new-game-container {
		padding: 10px;
	}

	#current-game-container {
		padding: 10px;
	}
</style>
<div id="new-game-container">
	<h1>How many <span>CakePHP classes</span> do you know in 60 seconds?</h1>
	<?php
		echo $this->Html->link('New Game', '#', array(
			'id' => 'new-game'
		));
	?>
</div>
<div id="game-container" style="display:none;">
	<h1>Game will automatically start when you make your first guess.</h1>
	<?php echo $this->Form->text('Guess.guess', array(
		'class' => 'guess-input',
		'autocomplete' => 'off'
	));
	?>
	<div id="timer-box"><span id="timer">0</span>/60</div>
	<div id="num-correct-box">You guessed <span id="num-correct">0</span> correct classes</div>
</div>
<div id="finished-game-container" style="display:none;">
	<h1>You have guessed <span id="total-correct"></span> classes, good job!</h1>
	<ul id="guessed-classes"></ul>
</div>