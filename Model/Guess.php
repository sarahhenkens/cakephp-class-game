<?php
App::uses('AppModel', 'Model');
/**
 * Guess Model
 *
 * @property Game $Game
 */
class Guess extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Records a guess for a game
 *
 * @param integer $gameId
 * @param array $data
 * @return array 
 */
	public function addGuess($gameId, $data) {
		$guess = $data[$this->alias]['guess'];

		$data = array(
			'game_id' => $gameId,
			'guess' => $guess,
			'time' => $data[$this->alias]['time']
		);

		$this->create();
		$saved = $this->save($data);

		$return = $this->find('first', array(
			'conditions' => array(
				$this->alias . '.id' => $this->id
			),
			'contain' => array('Game')
		));

		return $return;
	}

	public function beforeSave() {
		$valid =Configure::read('App.strings');

		$isCorrect = false;
		if (in_array($this->data[$this->alias]['guess'], $valid)) {
			$isCorrect = true;
		}

		$this->data[$this->alias] += array(
			'is_correct' => $isCorrect,
			'timestamp' => (int) (microtime(true) * 10000)
		);

		return true;
	}

	public function afterSave($created) {
		$gameId = $this->field('game_id');
		$this->Game->updateGameState($gameId);
	}
}
