<?php

class Controller_jQuery extends Controller {

	public function includeScript() {
		$this->view->addScript('jquery-2.1.1.min.js', 'jquery');
	}
}
