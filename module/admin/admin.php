<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/admin', array(
			'controller' => 'Controller_Admin',
			'module' => 'admin',
			'action' => 'settings',
		)
	);

$this->route()->addRule(
	'/admin/admin', array(
			'controller' => 'Controller_Admin',
			'module' => 'admin',
			'action' => 'settings',
		)
	);

$this->route()->addRule(
	'/admin/module/add', array(
			'controller' => 'Controller_Admin',
			'module' => 'admin',
			'action' => 'module_add',
		)
	);
