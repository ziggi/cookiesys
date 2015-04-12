<?php

class Controller_News_Admin extends Controller_Admin {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Admin();
		$this->model_news = new Model_News_Admin();
	}

	public function show() {
		$data['title'] = 'Новости';
		$data['text'] = 'Настройка новостей';

		$this->view->addData('module', array('news' => array('active' => true)));
		$this->view->render($data, 'news', 'admin/view.tpl');
	}
}