<?php

class Model_Admin extends Model {

	public function getModuleList() {
		$query = "SELECT
		            `name`, `title`, `description`
		          FROM
		            `module`
		          WHERE
		            `installed` = 1
		          ORDER BY
		            `name` ASC";

		$result = $this->db->query($query);

		if ($result === false || $result->rowCount() == 0) {
			$data['errorMsg'] = 'Модулей нет';
			return $data;
		}

		$data = array();

		$modules = $this->route()->getRule('/^\/admin\/.*$/');

		while ($row = $result->fetch()) {
			$name = $row['name'];

			foreach ($modules as $key => $value) {
				if ($name === $value['params']['module']) {
					$data[ $name ] = array(
							'title' => $row['title'],
							'description' => $row['description'],
						);
				}
			}
		}

		return $data;
	}

}