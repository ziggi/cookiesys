<?php


class Module extends Model {

	public function loadAll() {
		$query = "SELECT
		            `module1`.`name` as 'name',
		            `module2`.`name` as 'dep_name'
		          FROM
		            `module_depends`
		          INNER JOIN `module` `module1` ON
		            `module1`.`module_id` = `module_depends`.`module_id`
		          INNER JOIN `module` `module2` ON
		            `module2`.`module_id` = `module_depends`.`from_id`";

		$result = $this->db->query($query);

		if ($result === false || $result->rowCount() == 0) {
			$data['errorMsg'] = 'Модулей нет';
			return $data;
		}


		$modules = array_flip(array_diff(scandir('module/'), array('..', '.')));

		foreach ($modules as $module => &$params) {
			$params = array('loaded' => false, 'depends' => array());
		}

		while ($row = $result->fetch()) {
			array_push($modules[ $row['name'] ]['depends'], $row['dep_name']);
		}

		foreach ($modules as $module => &$params) {
			$this->load($modules, $module);
		}
	}

	public function load(&$modules, $module_name) {
		if ($modules[ $module_name ]['loaded']) {
			return;
		}

		foreach ($modules[ $module_name ]['depends'] as $dep_name) {
			$dep_params = $modules[ $dep_name ];

			foreach ($dep_params['depends'] as $dep_dep_name) {
				if ($dep_dep_name === $module_name) {
					throw new Exception('Рекурсивная зависимость модулей ' . $module_name . ' и ' . $dep_name);
				}
			}

			if (!$dep_params['loaded']) {
				$this->load($modules, $dep_name);
			}
		}

		$include_file = 'module/' . $module_name . '/' . $module_name . '.php';

		if (file_exists($include_file)) {
			$modules[ $module_name ]['loaded'] = true;

			include_once $include_file;
		} else {
			throw new Exception('Модуль ' . $module_name . ' не загружен');
		}
	}
}