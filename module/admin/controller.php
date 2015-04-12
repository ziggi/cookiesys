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

	public function show() {
		$this->view->render(null, 'admin', 'view/template.tpl');
	}

	public function settings() {
		$data['title'] = 'Настройки';
		$data['text'] = 'Настройки Cookiesys';
		$this->view->render($data, 'admin', 'view/settings.tpl');
	}

}