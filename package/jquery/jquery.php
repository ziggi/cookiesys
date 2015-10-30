<?php

class jQuery extends Singleton
{
	private static $_isadd = false;

	public static function addScript(View $view, $version)
	{
		if (!self::$_isadd) {
			$filename = 'jquery-' . $version . '.min.js';

			if (Config::get()->package->jquery->is_use_cdn || !file_exists(__DIR__ . '/' . $filename)) {
				$view->addScript('//ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js');
			} else {
				$view->addScript($filename, 'jquery');
			}

			self::$_isadd = true;
		}
	}
}
