<?php

include_once 'Smarty-3.1.14/Smarty.class.php';

class View implements iView {

	public $extends;

	private $smarty;

	function __construct() {
		$this->smarty = new Smarty();

		$this->smarty->setTemplateDir(Config::get()->path->template . '/' . Config::get()->site->template);
		$this->smarty->setCompileDir(__DIR__ . '/templates_c');
		$this->smarty->setCacheDir(__DIR__ . '/cache');
		$this->smarty->setConfigDir(__DIR__ . '/configs');

		$this->smarty->assign('uri', Config::get()->uri->returnArray());
	}

	public function addExtend($view, $module, $param = null) {
		$this->extends .= Config::get()->path->module . '/' . $module . '/' . $view . '|';
		
		if ($param !== null) {
			$this->smarty->assign($module, $param);
		}
	}

	public function render($data = null, $module = null, $file = 'template.tpl') {
		$this->smarty->assign('data', $data);

		if ($module === null) {
			$this->smarty->display('extends:' . $this->extends . $file);
		} else {
			$this->smarty->display('extends:' . $this->extends . Config::get()->path->module . '/' . $module . '/' . $file);
		}
	}

}