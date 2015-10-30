<?php

class Bootstrap extends Singleton
{
	private static $_is_script_add = false;
	private static $_is_style_add = false;

	public static function addScript(View $view, $version)
	{
		if (!self::$_is_script_add) {
			$filename = 'bootstrap-' . $version . '-dist/js/bootstrap.min.js';

			if (Config::get()->package->bootstrap->is_use_cdn || !file_exists(__DIR__ . '/' . $filename)) {
				$view->addScript('//maxcdn.bootstrapcdn.com/bootstrap/' . $version . '/js/bootstrap.min.js');
			} else {
				$view->addScript($filename, 'bootstrap');
			}

			self::$_is_script_add = true;
		}
	}

	public static function addStyle(View $view, $version)
	{
		if (!self::$_is_style_add) {
			$filename = 'bootstrap-' . $version . '-dist/css/bootstrap.min.css';

			if (Config::get()->package->bootstrap->is_use_cdn || !file_exists(__DIR__ . '/' . $filename)) {
				$view->addStyle('//maxcdn.bootstrapcdn.com/bootstrap/' . $version . '/css/bootstrap.min.css');
			} else {
				$view->addStyle($filename, 'bootstrap');
			}

			self::$_is_style_add = true;
		}
	}
}
