<?php

class Controller_Page extends Controller {

    function __construct() {
		parent::__construct();
        $this->model = new Model_Page();
    }

	public function show($params) {
		$page_name = $params['name'];

		$data = $this->model->get($page_name);
		
		$this->view->render($data, 'page', 'view.tpl');
	}
}