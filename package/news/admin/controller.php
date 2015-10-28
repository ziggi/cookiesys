<?php

class Controller_News_Admin extends Controller_Admin
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_News_Admin();
		$this->model_admin = new Model_Admin();
	}

	public function show()
	{
		$data['title'] = 'Новости';
		$data['submit'] = array(
				'add' => Config::get()->uri->site . '/admin/news/add'
			);

		$this->view->addData('package', array('news' => array('active' => true)));
		$this->view->render($data, 'news', array('admin/add.tpl', 'admin/settings.tpl'));
	}

	public function add()
	{
		$name = $this->request->getPost('name', 'string');
		$title = $this->request->getPost('title', 'string');
		$text = $this->request->getPost('text', 'string');

		$data = $this->model->add($name, $title, $text);
		var_dump($data);

		//$this->view->render($data, 'news', array('admin/add.tpl', 'admin/settings.tpl'));
		$this->show();
	}
}
