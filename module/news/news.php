<?php

$this->route()->addRule(
	'/news', array(
		'controller' => 'Controller_News',
		'module' => 'news',
		'action' => 'showAll',
	)
);

$this->route()->addRule(
	'/news/:id', array(
		'controller' => 'Controller_News',
		'module' => 'news',
		'action' => 'showOne',
	)
);

$this->route()->addRule(
	'/news/:year/:id', array(
		'controller' => 'Controller_News',
		'module' => 'news',
		'action' => 'showOne',
	)
);
