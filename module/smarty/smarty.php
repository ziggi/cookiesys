<?php

include_once 'Smarty-3.1.21/Smarty.class.php';

class View implements iView {

	public $extends;
	public $scripts;
	public $styles;
	public $data = array();

	private $smarty;
	private static $_instance = null;

	private function __construct() {
		$this->smarty = new Smarty();

		$this->smarty->setTemplateDir(array(
				'default' => Config::get()->path->template . '/' . Config::get()->site->template,
				'admin' => Config::get()->path->module . '/admin/view',
			));
		$this->smarty->setCompileDir(__DIR__ . '/templates_c');
		$this->smarty->setCacheDir(__DIR__ . '/cache');
		$this->smarty->setConfigDir(__DIR__ . '/configs');
		$this->smarty->force_compile = true;

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

	public function addData($key, $value) {
		if ($value == null) {
			return;
		}

		if (is_array($value)) {
			if ($key == null) {
				$this->data = array_merge($this->data, $value);
			} else {
				$this->data = array_merge_recursive($this->data, array($key => $value));
			}
		} else {
			if ($key == null) {
				$this->data[] = $value;
			} else {
				$this->data[$key] = $value;
			}
		}
	}

	public function render($data = null, $module = null, $file = 'template.tpl') {
		$this->addData(null, $data);
		$this->smarty->assign('data', $this->data);
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