<?php

class Route extends App {
	
	private static $_huri;

	public function addRule($pattern, $params) {
		self::$_huri[$pattern] = $params;
	}
	
	public function start() {
		$uri = substr($_SERVER['REQUEST_URI'], strlen( Config::get()->path->uri ));

		// default
		if ($uri == '/') {
			$uri = '/page/main';
		}

		// роутинг
		$key = null;
		$params = array();
		$found = 0;

		foreach (self::$_huri as $key_pattern => $pre_params) {
			// подготовка паттерна для сравнения
			$pattern = preg_replace('/\//i', '\/', $key_pattern);
			$pattern = preg_replace('/:(\w+)/i', '(\w+)', $pattern);

			// сравниваем URI с паттерном
			$found = preg_match('/^' . $pattern . '.?$/i', $uri, $matches);
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
				$key = $key_pattern;
				break;
			}
		}

		if ($found == 0) {
			throw new Exception('Не найдено');
		}

		$controller = self::$_huri[$key]['controller'];
		$action = self::$_huri[$key]['action'];
		$module = self::$_huri[$key]['module'];
		
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
