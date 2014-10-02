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
		$this->_cfg['db'] = array(
				'host' => '127.0.0.1',
				'base' => 'cookiesys',
				'user' => 'root',
				'pass' => 'root',
			);
		$this->_cfg['path'] = array(
				'uri' => 'cookiesys/',
				'site' => SITE_DIR,
				'template' => SITE_DIR . '/template',
				'module' => SITE_DIR . '/module',
			);
		$this->_cfg['uri'] = array(
				'site' => '//' . $_SERVER['SERVER_ADDR'] . '/' . $this->_cfg['path']['uri'],
				'module' => '//' . $_SERVER['SERVER_ADDR'] . '/' . $this->_cfg['path']['uri'] . 'module',
				'template' => '//' . $_SERVER['SERVER_ADDR'] . '/' . $this->_cfg['path']['uri'] . 'template/default',
			);
		$this->_cfg['site'] = array(
				'debug' => true,
				'template' => 'default',
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
