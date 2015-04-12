<?php

class Controller_Page_Admin extends Controller_Admin {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->model_news = new Model_Page_Admin();
	}

	public function show() {
		$data['title'] = 'Страницы';
		$data['text'] = 'Настройка страниц';

		$this->view->addData('module', array('page' => array('active' => true)));
		$this->view->render($data, 'page', 'admin/view.tpl');
	}
}