<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/admin', [
			'controller' => 'Controller_Admin',
			'package' => 'admin',
			'action' => 'settings',
		]
	);

$this->route()->addRule(
	'/admin/admin', [
			'controller' => 'Controller_Admin',
			'package' => 'admin',
			'action' => 'settings',
		]
	);

$this->route()->addRule(
	'/admin/package/add', [
			'controller' => 'Controller_Admin',
			'package' => 'admin',
			'action' => 'module_add',
		]
	);
