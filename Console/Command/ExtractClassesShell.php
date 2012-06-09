<?php

App::uses('AppShell', 'Console/Command');

class ExtractClassesShell extends AppShell {

	protected $_classes = array();

	protected $_ignore = array();

/**
 * Override startup of the Shell
 *
 * @return void
 */
	public function run() {
		Configure::write('debug', 1);
		$this->_ignore = array(
			CAKE . 'Test' . DS,
			CAKE . 'TestSuite' . DS,
			CAKE . 'Console' . DS . 'Templates' . DS
		);

		$this->extract(CAKE);
		$this->hr();
		$this->out(sprintf('Found %d classes', count($this->_classes)));

		file_put_contents(APP . 'Config' . DS . 'strings.json', json_encode($this->_classes));
	}

	public function extract($path) {
		$items = scandir($path);
		$items = array_diff($items, array('.', '..'));

		foreach ($items as $item) {
			$itemPath = $path . $item;

			if(is_dir($itemPath)) {
				$this->extract($itemPath . DS);
				continue;
			}

			$ignore = false;
			foreach ($this->_ignore as $ignored) {
				if(substr($itemPath, 0, strlen($ignored)) == $ignored) {
					$ignore = true;
					break;
				}
			}
			if($ignore) {
				continue;
			}

			if (pathinfo($itemPath, PATHINFO_EXTENSION) == 'php') {
				$php = file_get_contents($itemPath);
				$classes = $this->_getClassNames($php);

				if(empty($classes)) {
					$this->out('Notice: No classes found in ' . $itemPath);
				} else {
					$this->_classes = array_merge($this->_classes, $classes);
				}
			}
		}

	}

	protected function _getClassNames($code) {
		$classes = array();
		$tokens = token_get_all($code);
		$count = count($tokens);
		for ($i = 2; $i < $count; $i++) {
			if ($tokens[$i - 2][0] == T_CLASS && $tokens[$i - 1][0] == T_WHITESPACE && $tokens[$i][0] == T_STRING) {
				$classes[] = $tokens[$i][1];
			}
		}

		return $classes;
	}
}