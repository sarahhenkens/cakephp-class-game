<?php
App::uses('Guess', 'Model');

/**
 * Guess Test Case
 *
 */
class GuessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.guess',
		'app.game'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Guess = ClassRegistry::init('Guess');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Guess);

		parent::tearDown();
	}

}
