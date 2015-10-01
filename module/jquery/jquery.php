<?php

include 'controller.php';

$this->route()->addRule(
	'/', array(
			'controller' => 'Controller_jQuery',
			'module' => 'jquery',
			'action' => 'includeScript',
		)
	);
