<?php
App::uses('AppController', 'Controller');
/**
 * Guesses Controller
 *
 * @property Guess $Guess
 */
class GuessesController extends AppController {

	public function add() {
		if (!$this->request->is('post') || !$this->request->is('ajax')) {
			throw new MethodNotAllowedException();
		}

		$gameId = $this->Session->read('Game.id');

		
		$guess = $this->Guess->addGuess($gameId, $this->request->data);
		$this->set(compact('guess'));
	}
}
