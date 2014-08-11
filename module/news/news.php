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
