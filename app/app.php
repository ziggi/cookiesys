<?php

class App {
	
	private $_route;
	private $_module;

	public function init() {
		try {
			$this->module()->loadAll();
			$this->route()->start();
		} catch (Exception $e) {
			$this->error($e);
		}
	}
	
	public function route() {
		if (!$this->_route instanceof Route) {
			$this->_route = new Route;
		}
		return $this->_route;
	}

	public function module() {
		if (!$this->_module instanceof Module) {
			$this->_module = new Module;
		}
		return $this->_module;
	}
	
	public function error($e) {
		$error_msg = $e->getMessage();
		echo 'Ошибка: ' . $error_msg;
	}
}
