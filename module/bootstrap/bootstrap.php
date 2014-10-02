<?php

include 'controller.php';

$this->route()->addRule(
	'/', array(
			'controller' => 'Controller_Bootstrap',
			'module' => 'bootstrap',
			'action' => 'includeBootstrap',
		)
	); 
 
