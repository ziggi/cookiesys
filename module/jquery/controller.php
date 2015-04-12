<?php

class Controller_jQuery extends Controller {

	public function includeScript() {
		$this->view->addScript('jquery-2.1.3.min.js', 'jquery');
	}
}
