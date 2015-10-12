<?php

class Controller_Page_Admin extends Controller_Admin {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->model_page = new Model_Page_Admin();
	}

	public function show() {
		$data['title'] = 'Страницы';

		$this->view->addData('package', array('page' => array('active' => true)));
		$this->view->render($data, 'page', 'admin/view.tpl');
	}
}