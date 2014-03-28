<?php

class Controller_News extends Controller {

	function __construct() {
		parent::__construct();
		$this->model = new Model_News();
	}

	public function showAll() {
		$data = $this->model->getAll();
		
		if (isset($data['errorMsg'])) {
			$this->view->render($data, null, '404.tpl');
		} else {
			$this->view->render($data, 'news', 'view_all.tpl');
		}
	}

	public function showOne($param) {
		$news_name = $param['name'];

		$data = $this->model->get($news_name);
		
		if (isset($data['errorMsg'])) {
			$this->view->render($data, null, '404.tpl');
		} else {
			$this->view->render($data, 'news', 'view.tpl');
		}
	}
}