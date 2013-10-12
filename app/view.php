<?php

interface iView {
	public function render($data = null, $module = null, $file = 'template.tpl');
}
