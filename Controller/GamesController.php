<?php
App::uses('AppController', 'Controller');
/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController {

	public function home() {
		
	}

	public function create() {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}

		$game = $this->Game->createGame($this->request->clientIp());
		$this->Session->write('Game.id', $game['Game']['id']);

		$this->set(compact('game'));
	}

	public function finish() {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}

		$gameId = $this->request->data['Game']['id'];
		$game = $this->Game->finish($gameId);

		$this->set(compact('game'));
	}
}