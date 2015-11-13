<?php

class Route extends App
{
	private static $_uri_array;

	public function addRule($pattern, $params)
	{
		self::$_uri_array[] = ['pattern' => $pattern, 'params' => $params];
	}

	public function getRule($pattern)
	{
		$result = [];

		foreach (self::$_uri_array as $row) {
			$found = preg_match($pattern, $row['pattern'], $matches);
			if ($found == 1) {
				$result[] = $row;
			}
		}

		return $result;
	}

	public function start()
	{
		$uri = urldecode(Config::get()->uri->request);

		// default
		if ($uri == '/') {
			$uri = '/news';
		}

		// роутинг
		$key = null;
		$params = [];
		$found = 0;

		if (self::$_uri_array === null) {
			throw new Exception('Не заданы правила маршрутизации');
		}

		foreach (self::$_uri_array as $uri_key => $uri_array) {
			$key_pattern = $uri_array['pattern'];

			// реализация постоянного роутинга
			if ($key_pattern == '/') {
				$this->executeAction($uri_key);
				continue;
			}

			if ($found == 1) {
				continue;
			}

			// подготовка паттерна для сравнения и выполнение регулярных выражений в паттерне
			$pattern = preg_replace('/\//i', '\/', $key_pattern);
			$pattern = preg_replace_callback('/:(\w+)(\{([^:]+)\})?/iu',
				function ($matches) {
					$type_name = isset($matches[3]) ? $matches[3] : false;

					if ($type_name !== false) {
						$type_pattern = Types::getPattern($type_name);

						if ($type_pattern !== false) {
							return "(" . $type_pattern  . ")";
						} else {
							return "(" . $type_name . ")";
						}
					} else {
						return "(" . Types::getPattern('string') . ")";
					}
				}
				, $pattern);

			// сравниваем URI с паттерном
			$found = preg_match('/^' . $pattern . '\/?$/iu', $uri, $matches);
			if ($found == 1) {
				array_shift($matches);
				$params = $matches;
				$param_count = count($params);

				// создаём массив параметров
				if ($param_count > 0) {
					preg_match_all('/:(\w+)/i', $key_pattern, $matches);

					$key_count = count($matches[1]);

					if ($key_count > $param_count) {
						$matches[1] = array_slice($matches[1], $param_count);
					}

					$params = array_combine(array_values($matches[1]), $params);
				}

				// отдаём нужный ключ для параметров роутинга
				$key = $uri_key;
			}
		}

		if ($found == 0) {
			throw new Exception('Не найдено');
		}

		$this->executeAction($key, $params);
	}

	public function executeAction($key, $params = null)
	{
		if ($key === null) {
			throw new Exception('Паттерн не найден');
		}

		$controller = self::$_uri_array[$key]['params']['controller'];
		$action = self::$_uri_array[$key]['params']['action'];
		$package = self::$_uri_array[$key]['params']['package'];

		// подгрузка контроллера
		$include_file = "package/" . $package . "/controller.php";

		if (!file_exists($include_file)) {
			throw new Exception('Контроллер не подгружен');
		} else {
			include_once $include_file;
		}

		// проверяем на существование
		if (!class_exists($controller)) {
			throw new Exception('Не найден контроллер');
		}

		if (!method_exists($controller, $action)) {
			throw new Exception('Не найден обработчик');
		}

		// вызываем метод
		$controller = new $controller;
		$controller->$action($params);
	}
}
