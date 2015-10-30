<?php

class Controller_News_Admin extends Controller_Admin
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_News_Admin();
		$this->model_admin = new Model_Admin();
		$this->model_news = new Model_News();
	}

	public function show($data)
	{
		if ($this->request->isAfterRedirect()) {
			$this->request->unsetParam('after_redirect', Request::METHOD_SESSION);
		}

		$data['title'] = 'Новости';
		$data['submit'] = [
				'add' => Config::get()->uri->site . '/admin/news/add'
			];

		$this->view->addData('package', ['news' => ['active' => true]]);
		$this->view->render($data, 'news', ['admin/add.tpl', 'admin/settings.tpl']);
	}

	public function add()
	{
		$validate = new Validator($this->request->getAll(Request::METHOD_POST), [
				'name' => ['required', 'string'],
				'title' => ['required', 'string'],
				'text' => ['required', 'text'],
			]);

		try {
			if (!$validate->isValid()) {
				throw new Exception('Валидация не пройдена');
			}

			$name = $validate->getParam('name');
			$title = $validate->getParam('title');
			$text = $validate->getParam('text');

			$is_exist = $this->model_news->get($name) !== false;
			if ($is_exist) {
				throw new Exception('Новость с таким именем уже существует');
			}

			$is_added = $this->model->add($name, $title, $text);
			if (!$is_added) {
				throw new Exception('Запрос не выполнен');
			}

			$data['successMsg'] = 'Новость успешно добавлена';
		} catch (Exception $e) {
			$data['validator'] = $validate->getInfo();

			$data['errorMsg'] = $e->getMessage();
		} finally {
			$this->request->redirect(['admin/news', 'data' => $data]);
		}
	}
}
