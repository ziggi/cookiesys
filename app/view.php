<?php

interface iView
{
	public static function getInstance();
	public function addExtend($view, $package, $param);
	public function addStyle($name, $package);
	public function addScript($name, $package);
	public function render($data = null, $package = null, $files = 'template.tpl');
}
