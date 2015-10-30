<?php

class Types
{
	private static $_types = [
			'number' => '[0-9]+',
			'string' => '[a-zа-яё0-9\-]+',
			'text' => '[\w\s\d]+',
		];

	public static function getPatternList()
	{
		if (count(self::$_types) > 0) {
			return self::$_types;
		}

		return false;
	}

	public static function getPattern($type)
	{
		if (self::isExists($type)) {
			return self::$_types[$type];
		}

		return false;
	}

	public static function setPattern($type, $pattern)
	{
		self::$_types[$type] = $pattern;

		return true;
	}

	public static function isExists($type)
	{
		return isset(self::$_types[$type]);
	}
}
