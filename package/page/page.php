<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/page/:name', array(
			'controller' => 'Controller_Page',
			'package' => 'page',
			'action' => 'show',
		)
	);

include 'admin/model.php';
include 'admin/controller.php';

$this->route()->addRule(
	'/admin/page', array(
			'controller' => 'Controller_Page_Admin',
			'package' => 'page',
			'action' => 'show',
		)
	);