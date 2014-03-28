<?php

interface iView {
	public function render($data = null, $module = null, $file = 'template.tpl');
	public function addExtend($view, $module, $param);
}
