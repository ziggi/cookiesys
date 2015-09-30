<?php

class Route extends App {
	
	private static $_uri_array;
	private static $_pattern_types = array(
			'number' => '[0-9]+',
			'string' => '[a-zA-Zа-яА-ЯёЁ0-9\-]+',
		);

	public function addRule($pattern, $params) {
		self::$_uri_array[] = array('pattern' => $pattern, 'params' => $params);
	}

	public function getRule($pattern) {
		$result = array();

		foreach (self::$_uri_array as $row) {
			$found = preg_match($pattern, $row['pattern'], $matches);
			if ($found == 1) {
				$result[] = $row;
			}
		}

		return $result;
	}
	
	public function start() {
		$uri = urldecode(Config::get()->uri->request);

		// default
		if ($uri == '/') {
			$uri = '/news';
		}

		// роутинг
		$key = null;
		$params = array();
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
			$pattern = preg_replace_callback('/:(\w+)(\{([^:]+)\})?/i',
				function ($matches) {
					if (isset($matches[3])) {
						if (isset(self::$_pattern_types[$matches[3]])) {
							return "(" . self::$_pattern_types[$matches[3]] . ")";
						} else {
							return "(" . $matches[3] . ")";
						}
					} else {
						return "(" . self::$_pattern_types['string'] . ")";
					}
				}
				, $pattern);

			// сравниваем URI с паттерном
			$found = preg_match('/^' . $pattern . '.?$/iu', $uri, $matches);
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

	public function executeAction($key, $params = null) {
		if ($key === null) {
			throw new Exception('Паттерн не найден');
		}

		$controller = self::$_uri_array[$key]['params']['controller'];
		$action = self::$_uri_array[$key]['params']['action'];
		$module = self::$_uri_array[$key]['params']['module'];
		
		// подгрузка контроллера
		include_once "module/" . $module . "/controller.php";

		// проверяем на существование
		if ( !class_exists($controller) ) {
			throw new Exception('Не найден контроллер');
		}

		if ( !method_exists($controller, $action) ) {
			throw new Exception('Не найден обработчик');
		}

		// вызываем метод
		$controller = new $controller;
		$controller->$action($params);
	}
}
