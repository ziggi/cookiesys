<?php

interface iView {
	public static function getInstance();
	public function addExtend($view, $module, $param);
	public function addStyle($name, $module);
	public function addScript($name, $module);
	public function render($data = null, $module = null, $file = 'template.tpl');
}
