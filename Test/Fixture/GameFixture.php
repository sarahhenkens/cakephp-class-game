<?php
/**
 * GameFixture
 *
 */
class GameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nickname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'started' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'ended' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'num_guesses' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'num_incorrent' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'num_correct' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nickname' => 'Lorem ipsum dolor sit amet',
			'started' => '2012-06-09 12:13:43',
			'ended' => '2012-06-09 12:13:43',
			'num_guesses' => 1,
			'num_incorrent' => 1,
			'num_correct' => 1,
			'created' => '2012-06-09 12:13:43',
			'modified' => '2012-06-09 12:13:43'
		),
	);

}
