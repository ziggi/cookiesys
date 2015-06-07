<?php


class Module extends Model {
	private $modules;

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


		$this->modules = array_flip(array_diff(scandir('module/'), array('..', '.')));

		foreach ($this->modules as $module => &$params) {
			$params = array('loaded' => 0, 'depends' => array());
		}

		while ($row = $result->fetch()) {
			array_push($this->modules[ $row['name'] ]['depends'], $row['dep_name']);
		}

		foreach ($this->modules as $module => &$params) {
			$this->load($module);
		}
	}

	public function load($module_name) {
		if ($this->modules[ $module_name ]['loaded'] == 1) {
			return;
		}

		foreach ($this->modules[ $module_name ]['depends'] as $dep_name) {
			$dep_params = $this->modules[ $dep_name ];

			if ($this->modules[ $dep_name ]['loaded'] == 0) {
				$this->load($dep_name);
			}
		}

		$include_file = 'module/' . $module_name . '/' . $module_name . '.php';

		if (file_exists($include_file)) {
			$this->modules[ $module_name ]['loaded'] = 1;
			
			include_once $include_file;
		} else {
			throw new Exception('Модуль ' . $module_name . ' не загружен');
		}
	}
}