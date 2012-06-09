<?php

$output = array(
	'Game' => array(
		'id' => (int) $game['Game']['id'],
		'num_guesses' => (int) $game['Game']['num_guesses'],
		'num_correct' => (int) $game['Game']['num_correct'],
		'permalink' => Router::url(array('controller' => 'games', 'action' => 'view', $game['Game']['id']), true)
	)
);

echo json_encode($output);
