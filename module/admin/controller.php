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
		$data['title'] = 'Настройки';
		$data['text'] = 'Настройки Cookiesys';

		$this->view->addData('module', array('admin' => array('active' => true)));
		$this->view->render($data, 'admin', 'view/settings.tpl');
	}

}