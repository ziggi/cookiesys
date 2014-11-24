<?php

include_once 'Smarty-3.1.19/Smarty.class.php';

class View implements iView {

	public $extends;
	public $scripts;
	public $styles;

	private $smarty;
	private static $_instance = null;

	private function __construct() {
		$this->smarty = new Smarty();

		$this->smarty->setTemplateDir(Config::get()->path->template . '/' . Config::get()->site->template);
		$this->smarty->setCompileDir(__DIR__ . '/templates_c');
		$this->smarty->setCacheDir(__DIR__ . '/cache');
		$this->smarty->setConfigDir(__DIR__ . '/configs');

		$this->smarty->assign('uri', Config::get()->uri->returnArray());
	}

	private function __clone() {

	}

	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function addExtend($view, $module, $param = null) {
		$this->extends .= Config::get()->path->module . '/' . $module . '/' . $view . '|';
		
		if ($param !== null) {
			$this->smarty->assign($module, $param);
		}
	}

	public function addScript($name, $module) {
		$this->scripts[] = Config::get()->uri->module . '/' . $module . '/' . $name;
	}

	public function addStyle($name, $module) {
		$this->styles[] = Config::get()->uri->module . '/' . $module . '/' . $name;
	}

	public function render($data = null, $module = null, $file = 'template.tpl') {
		$this->smarty->assign('data', $data);
		$this->smarty->assign('scripts', $this->scripts);
		$this->smarty->assign('styles', $this->styles);

		if ($module === null) {
			$this->smarty->display('extends:' . $this->extends . $file);
		} else {
			$module_template = Config::get()->path->template . '/' . Config::get()->site->template . '/module/' . $module . '/' . $file;
			
			if (file_exists($module_template)) {
				$this->smarty->display('extends:' . $this->extends . $module_template);
			} else {
				$this->smarty->display('extends:' . $this->extends . Config::get()->path->module . '/' . $module . '/' . $file);
			}
		}
	}
}