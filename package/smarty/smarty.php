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
				'default' => Config::get()->path->package . '/' . Config::get()->site->template,
				'admin' => Config::get()->path->package . '/admin/view',
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

	public function addExtend($view, $package, $param = null) {
		$this->extends .= Config::get()->path->package . '/' . $package . '/' . $view . '|';
		
		if ($param !== null) {
			$this->smarty->assign($package, $param);
		}
	}

	public function addScript($name, $package = null) {
		if ($package === null) {
			$this->scripts[] = $name;
		} else {
			$this->scripts[] = Config::get()->uri->package . '/' . $package . '/' . $name;
		}
	}

	public function addStyle($name, $package = null) {
		if ($package === null) {
			$this->styles[] = $name;
		} else {
			$this->styles[] = Config::get()->uri->package . '/' . $package . '/' . $name;
		}
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

	public function render($data = null, $package = null, $files = 'template.tpl') {
		if (!isset($this->data['template']) || $this->data['template'] !== 'admin') {
			include_once Config::get()->path->package . '/' . Config::get()->site->template . '/' . Config::get()->site->template . '.php';
		}

		$this->addData(null, $data);
		$this->smarty->assign('data', $this->data);
		$this->smarty->assign('scripts', $this->scripts);
		$this->smarty->assign('styles', $this->styles);

		$extends = '';

		if (!is_array($files)) {
			$files = array($files);
		}

		foreach ($files as $file) {
			if ($package === null) {
				$extends .= $this->extends . $file . '|';
			} else {
				$package_template = Config::get()->path->package . '/' . Config::get()->site->template . '/package/' . $package . '/' . $file;
				
				if (file_exists($package_template)) {
					$extends .= $this->extends . $package_template . '|';
				} else {
					$extends .= $this->extends . Config::get()->path->package . '/' . $package . '/' . $file . '|';
				}
			}
		}

		$this->smarty->display('extends:' . substr($extends, 0, -1));
	}
}