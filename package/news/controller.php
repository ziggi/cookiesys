<?php

class Controller_News extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_News();
	}

	public function showAll()
	{
		$data = $this->model->getAll();

		if ($data === false) {
			$data['errorMsg'] = 'Новостей нет';
			
			$this->view->render($data, null, '404.tpl');
		} else {
			$this->view->render($data, 'news', 'view_all.tpl');
		}
	}

	public function showOne($params)
	{
		$news_name = $params['name'];

		$data = $this->model->get($news_name);

		if ($data === false) {
			$data['errorMsg'] = 'Новость не найдена';
			
			$this->view->render($data, null, '404.tpl');
		} else {
			$this->view->render($data, 'news', 'view.tpl');
		}
	}
}
