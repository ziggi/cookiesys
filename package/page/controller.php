<?php

class Controller_Page extends Controller {

	function __construct() {
		parent::__construct();
		$this->model = new Model_Page();
	}

	public function show($params) {
		$page_name = $params['name'];

		$data = $this->model->get($page_name);
		
		if (isset($data['errorMsg'])) {
			$this->view->render($data, null, '404.tpl');
		} else {
			$this->view->render($data, 'page', 'view.tpl');
		}
	}
}