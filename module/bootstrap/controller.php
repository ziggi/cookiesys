<?php

class Controller_Bootstrap extends Controller {

	public function includeBootstrap() {
		$this->view->addStyle('css/bootstrap.min.css', 'bootstrap');
		$this->view->addScript('js/bootstrap.min.js', 'bootstrap');
	}
}
