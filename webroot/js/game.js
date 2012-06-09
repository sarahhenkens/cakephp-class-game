/* Holds the current game instance */
var currentGame = null;

/* The Game Class */
function Game(length) {
	this.INTERVAL = 200;

	this.gameId = null;
	this.started = false;
	this.finished = false;

	this.numGuesses = 0;
	this.numCorrect = 0;

	this.guesses = new Array();

	this.startTime = null;

	this.length = length * 1000;

	this.init = function() {
		this.startTime = new Date().getTime();

		$.ajax({
			type: 'POST',
			url: '/games/create.json',
			context: this
		}).done(this.onCreateDone);

		$('#new-game-container').css('display', 'none');
		$('#game-container').css('display', 'block');
	}

	this.onCreateDone = function(data) {
		this.gameId = data.Game.id;
	}

	this.addGuess = function(guess) {
		if(this.finished) {
			alert('Game was finished');
			return;
		}

		if(!this.started) {
			this.start();
		}

		if($.inArray(guess, this.guesses) != -1) {
			return true;
		}

		this.guesses.push(guess);

		var time = new Date().getTime() - this.startTime;

		postData = {
			'data[Guess][game_id]': this.gameId,
			'data[Guess][guess]': guess,
			'data[Guess][time]': time
		};

		$.ajax({
			type: 'POST',
			url: '/guesses/add.json',
			data: postData,
			context: this
		}).done(this.onAddGuessDone);
	}

	this.onAddGuessDone = function(data) {
		this.numGuesses = data.Game.num_guesses;
		this.numCorrect = data.Game.num_correct;

		this.updateUI();
	}

	this.start = function() {
		this.started = true;

		this.startTime = new Date().getTime();
		this.time = 0;

		var context = this;
		this.intervalID = setInterval(function() {
			context.tick();
		}, this.INTERVAL);
	}

	this.stop = function() {
		this.started = false;
		this.finished = true;

		clearInterval(this.intervalID);

		$.ajax({
			type: 'POST',
			data: {'data[Game][id]': this.gameId},
			url: '/games/finish.json',
			context: this
		}).done(this.onStopGameDone);
	}

	this.onStopGameDone = function(data) {
		console.log(data);
		this.setupFinishedGameUI(data);
	}

	this.setupFinishedGameUI = function(gameData) {
		$('#total-correct').text(gameData.Game.num_correct);
		$('#permalink').text(gameData.Game.permalink);

		$('#game-container').css('display', 'none');
		$('#finished-game-container').css('display', 'block');
	}

	this.tick = function() {
		if(this.started == false) {
			return true;
		}
		var runtime = new Date().getTime() - this.startTime;
		if(runtime >= this.length) {
			this.stop();
		}

		this.updateUI();
	}

	this.updateUI = function() {
		var runtime = new Date().getTime() - this.startTime;
		var formattedSeconds = Math.floor(runtime / 1000);

		$('#timer').text(formattedSeconds);
		$('#num-correct').text(this.numCorrect);
	}
}

$(document).ready(function(){
	$('#new-game').click(function(event){
		currentGame = new Game(60);
		currentGame.init();
	});

	$('#GuessGuess').keydown(function(e) {
		if(e.which == 32 || e.which == 13) {
			var guess = $(this).val();
			$(this).val('');
			if(guess.length > 0) {
				currentGame.addGuess(guess);
			}
		}
	});
});
