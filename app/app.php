<?php

class App {
	
	private $_route;
	private $_package;

	public function init() {
		try {
			$this->package()->loadAll();
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

	public function package() {
		if (!$this->_package instanceof Package) {
			$this->_package = new Package;
		}
		return $this->_package;
	}
	
	public function error($e) {
		$error_msg = $e->getMessage();
		echo 'Ошибка: ' . $error_msg;
	}
}
