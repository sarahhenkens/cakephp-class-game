<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property Guess $Guess
 */
class Game extends AppModel {

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array('Guess');

/**
 * Initialises a fresh game
 *
 * @return array 
 */
	public function createGame($clientIp) {
		$data = array(
			'ip' => $clientIp,
			'status' => 'created'
		);

		$this->create();
		$this->save($data);
		return $this->find('first', array(
			'conditions' => array(
				$this->alias . '.id' => $this->id
			)
		));
	}

	public function finish($id) {
		$data = array(
			'ended' => (int) (microtime(true) * 10000),
			'status' => 'ended'
		);

		$this->id = $id;
		$this->save($data);

		return $this->find('first', array(
			'conditions' => array(
				$this->alias . '.id' => $this->id
			)
		));
	}

	public function updateGameState($id) {
		$start = microtime(true);
		$result = $this->Guess->find('first', array(
			'conditions' => array(
				'Guess.game_id' => $id
			),
			'fields' => array(
				'COUNT(*) AS num_guesses',
				'SUM(IF(Guess.is_correct,1,0)) AS num_correct'
			)
		));

		$data = array(
			'num_guesses' => $result[0]['num_guesses'],
			'num_correct' => $result[0]['num_correct'],
			'num_incorrect' => $result[0]['num_guesses'] - $result[0]['num_correct']
		);

		$this->id = $id;
		$this->save($data, array('validate' => false, 'callbacks' => false));
	}
}
