<?php

class Controller_Admin extends Controller {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->init();
	}

	public function init() {
		$this->view->addStyle('view/css/style.css', 'admin');

		$data = $this->model->getModuleList();
		$this->view->addData('module', $data);
	}

	public function settings() {
		$this->view->addScript('js/module_add.js', 'admin');

		$this->view->addData('module', array('admin' => array('active' => true)));
		$this->view->render(null, 'admin', 'view/settings.tpl');
	}

	public function module_add() {
		print_r($_FILES);
	}

}