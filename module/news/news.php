<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/news', array(
			'controller' => 'Controller_News',
			'module' => 'news',
			'action' => 'showAll',
		)
	);

$this->route()->addRule(
	'/news/:name{string}', array(
			'controller' => 'Controller_News',
			'module' => 'news',
			'action' => 'showOne',
		)
	);


include 'admin/model.php';
include 'admin/controller.php';

$this->route()->addRule(
	'/admin/news', array(
			'controller' => 'Controller_News_Admin',
			'module' => 'news',
			'action' => 'show',
		)
	);
