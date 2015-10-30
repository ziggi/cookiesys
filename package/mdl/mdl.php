<?php

class Mdl extends Singleton
{
	private static $_is_script_add = false;
	private static $_is_style_add = false;

	public static function addScript(View $view, $version)
	{
		if (!self::$_is_script_add) {
			$filename = 'mdl-' . $version . '/material.min.js';

			if (Config::get()->package->mdl->is_use_cdn || !file_exists(__DIR__ . '/' . $filename)) {
				$view->addScript('//storage.googleapis.com/code.getmdl.io/' . $version . '/material.min.js');
			} else {
				$view->addScript($filename, 'mdl');
			}

			self::$_is_script_add = true;
		}
	}

	public static function addStyle(View $view, $version)
	{
		if (!self::$_is_style_add) {
			$filename = 'mdl-' . $version . '/material.min.css';

			if (Config::get()->package->mdl->is_use_cdn || !file_exists(__DIR__ . '/' . $filename)) {
				$view->addStyle('//storage.googleapis.com/code.getmdl.io/' . $version . '/material.' . Config::get()->package->mdl->color_scheme . '.min.css');
				$view->addStyle('//fonts.googleapis.com/icon?family=Material+Icons');
			} else {
				$view->addStyle($filename, 'mdl');
				$view->addStyle('material_icons.css', 'mdl');
			}

			self::$_is_style_add = true;
		}
	}
}
