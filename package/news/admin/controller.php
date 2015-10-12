<?php

class Controller_News_Admin extends Controller_Admin {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->model_news = new Model_News_Admin();
	}

	public function show() {
		$this->view->addData('package', array('news' => array('active' => true)));
		$this->view->render(null, 'news', array('admin/add.tpl', 'admin/settings.tpl'));
	}
}