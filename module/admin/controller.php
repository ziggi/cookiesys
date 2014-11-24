<?php

class Controller_Admin extends Controller {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
	}

	public function show() {
		$this->view->addStyle('view/css/style.css', 'admin');

		$data = $this->model->getModuleList();
		$this->view->render($data, 'admin', 'view/template.tpl');
	}

}