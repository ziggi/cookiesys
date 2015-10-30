<?php

abstract class Singleton
{
	protected function __construct()
	{

	}

	final private function __clone()
	{

	}

	final public static function getInstance()
	{
		static $instances = [];

		$called_class = get_called_class();

		if (!isset($instances[$called_class])) {
			$instances[$called_class] = new $called_class();
		}

		return $instances[$called_class];
	}
}
