<?php

include 'model.php';
include 'controller.php';

$this->route()->addRule(
	'/page/:name', array(
		'controller' => 'Controller_Page',
		'module' => 'page',
		'action' => 'show',
	)
);