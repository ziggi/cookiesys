<?php

class Config extends App {
	
	private $_pointer = null;
	private $_cfg;
	
	public static function get() {
		return (new Config);
	}

	public function returnArray() {
		return $this->_pointer;
	}
	
	function __construct() {
		// editable zone
		$this->_cfg['db'] = array(
				'host' => '127.0.0.1',
				'base' => 'cookiesys',
				'user' => 'root',
				'pass' => 'root',
			);
		$this->_cfg['site'] = array(
				'debug' => true,
				'template' => 'default',
			);

		// not editable zone
		$site_path = dirname($_SERVER['SCRIPT_FILENAME']);
		$site_subdir = dirname($_SERVER['PHP_SELF']);
		$site_uri = preg_replace('#/$#', '', $_SERVER['SERVER_NAME'] . $site_subdir);

		$this->_cfg['path'] = array(
				'uri' => $site_subdir,
				'site' => $site_path,
				'module' => $site_path . '/module',
				'template' => $site_path . '/template',
			);
		$this->_cfg['uri'] = array(
				'site' => '//' . $site_uri,
				'module' => '//' . $site_uri . '/module',
				'template' => '//' . $site_uri . '/template/' . $this->_cfg['site']['template'],
				'current' => '//' . preg_replace('#/$#', '', $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']),
				'request' => str_replace($site_subdir, '', $_SERVER['REQUEST_URI']),
			);
	}
	
	function __get($name) { 
		if ($this->_pointer === null) {
			if (isset($this->_cfg[$name])) {
				$this->_pointer = $this->_cfg[$name];
			} else {
				return null;
			}
		} else {
			if (isset($this->_pointer[$name])) {
				$this->_pointer = $this->_pointer[$name];
			} else {
				return false;
			}
		}

		if (is_array($this->_pointer)) {
			return $this;
		} else {
			$result = $this->_pointer;
			$this->_pointer = null;
			return $result;
		}
	}
}
