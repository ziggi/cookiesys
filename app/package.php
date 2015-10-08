<?php

class Package extends Model {

	public function loadAll() {
		// get all packages from db
		$query = "SELECT
		            `name`,
		            `installed`,
		            `autoload`
		          FROM
		            `package`";

		$result = $this->db->query($query);

		if ($result === false || $result->rowCount() == 0) {
			throw new Exception('Пакетов не обнаружено');
		}

		// make packages array
		$packages = array();

		while ($row = $result->fetch()) {
			if (!(bool)$row['installed']) {
				continue;
			}

			$packages[ $row['name'] ] = array(
			        'autoload' => $row['autoload'],
			        'loaded' => false,
			        'depends' => array(),
			    );
		}

		// get all packages depends
		$query = "SELECT
		            `package1`.`name` as 'name',
		            `package2`.`name` as 'dep_name'
		          FROM
		            `package_depends`
		          INNER JOIN `package` `package1` ON
		            `package1`.`package_id` = `package_depends`.`package_id`
		          INNER JOIN `package` `package2` ON
		            `package2`.`package_id` = `package_depends`.`from_id`";

		$result = $this->db->query($query);

		if ($result !== false && $result->rowCount() > 0) {
			while ($row = $result->fetch()) {
				if (isset($packages[ $row['name'] ])) {
					if (isset($packages[ $row['dep_name'] ])) {
						array_push($packages[ $row['name'] ]['depends'], $row['dep_name']);
					} else {
						throw new Exception('Неразрешённая зависимость пакета ' . $row['name'] . ' от ' . $row['dep_name']);
					}
				}
			}
		}

		// recursive load
		foreach ($packages as $package => &$params) {
			if ($params['autoload']) {
				$this->load($packages, $package);
			}
		}
	}

	public function load(&$packages, $package_name) {
		if ($packages[ $package_name ]['loaded']) {
			return;
		}

		foreach ($packages[ $package_name ]['depends'] as $dep_name) {
			$dep_params = $packages[ $dep_name ];

			foreach ($dep_params['depends'] as $dep_dep_name) {
				if ($dep_dep_name === $package_name) {
					throw new Exception('Рекурсивная зависимость пакетов ' . $package_name . ' и ' . $dep_name);
				}
			}

			if (!$dep_params['loaded']) {
				$this->load($packages, $dep_name);
			}
		}

		$include_file = 'package/' . $package_name . '/' . $package_name . '.php';

		if (file_exists($include_file)) {
			$packages[ $package_name ]['loaded'] = true;

			include_once $include_file;
		} else {
			throw new Exception('Модуль ' . $package_name . ' не загружен');
		}
	}
}