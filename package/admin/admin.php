<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/admin', array(
			'controller' => 'Controller_Admin',
			'package' => 'admin',
			'action' => 'settings',
		)
	);

$this->route()->addRule(
	'/admin/admin', array(
			'controller' => 'Controller_Admin',
			'package' => 'admin',
			'action' => 'settings',
		)
	);

$this->route()->addRule(
	'/admin/package/add', array(
			'controller' => 'Controller_Admin',
			'package' => 'admin',
			'action' => 'module_add',
		)
	);
