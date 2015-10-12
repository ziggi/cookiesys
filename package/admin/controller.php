<?php

class Controller_Admin extends Controller {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->init();
	}

	public function init() {
		Mdl::getInstance()->addStyle($this->view, '1.0.5');
		Mdl::getInstance()->addScript($this->view, '1.0.5');

		$this->view->addStyle('view/css/style.css', 'admin');

		$data = $this->model->getPackageList();
		$this->view->addData('template', 'admin');
		$this->view->addData('package', $data);
	}

	public function settings() {
		$data['title'] = 'Админ панель';

		$this->view->addScript('js/package_add.js', 'admin');

		$this->view->addData('package', array('admin' => array('active' => true)));
		$this->view->render($data, 'admin', 'view/settings.tpl');
	}

	public function package_add() {
		print_r($_FILES);
	}

}