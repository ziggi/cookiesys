<?php

class jQuery {

	private static $_isadd = false;

	protected static $_instance = null;

	private function __construct() {

	}

	private function __clone() {

	}

	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public static function addScript(View $view, $version) {
		if (!self::$_isadd) {
			$filename = 'jquery-' . $version . '.min.js';

			if (Config::get()->module->jquery->is_use_cdn || !file_exists(__DIR__ . '/' . $filename)) {
				$view->addScript('//ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js');
			} else {
				$view->addScript($filename, 'jquery');
			}

			self::$_isadd = true;
		}
	}
}
