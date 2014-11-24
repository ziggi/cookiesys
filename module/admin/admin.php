<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/admin', array(
			'controller' => 'Controller_Admin',
			'module' => 'admin',
			'action' => 'show',
		)
	);
