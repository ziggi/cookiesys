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
		$this->_cfg = array(
			'debug' => true,
			'test' => array(
				'test1' => array(
					'test2' => 23,
				),
			),
			'path' => array(
				'uri' => 'cookiesys/',
				'site' => SITE_DIR,
				'template' => SITE_DIR . '/template',
				'module' => SITE_DIR . '/module',
			),
			'uri' => array(
				'site' => '//' . $_SERVER['SERVER_ADDR'] . '/cookiesys',
				'asset' => '//' . $_SERVER['SERVER_ADDR'] . '/cookiesys/asset',
				'template' => '//' . $_SERVER['SERVER_ADDR'] . '/cookiesys/template/default',
			),
			'site' => array(
				'template' => 'default',
			),
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
