<?php

class Controller_Admin extends Controller {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->init();
	}

	public function init() {
		jQuery::getInstance()->addScript($this->view, '2.1.3');
		Bootstrap::getInstance()->addScript($this->view, '3.3.4');
		Bootstrap::getInstance()->addStyle($this->view, '3.3.4');

		$this->view->addStyle('view/css/style.css', 'admin');

		$data = $this->model->getPackageList();
		$this->view->addData('template', 'admin');
		$this->view->addData('package', $data);
	}

	public function settings() {
		$this->view->addScript('js/package_add.js', 'admin');

		$this->view->addData('package', array('admin' => array('active' => true)));
		$this->view->render(null, 'admin', 'view/settings.tpl');
	}

	public function package_add() {
		print_r($_FILES);
	}

}