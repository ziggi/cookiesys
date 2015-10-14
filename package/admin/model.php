<?php

class Model_Admin extends Model
{
	public function getPackageList()
	{
		$query = "SELECT
		            `name`, `title`, `description`
		          FROM
		            `package`
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

		$packages = $this->route()->getRule('/^\/admin\/.*$/');

		while ($row = $result->fetch()) {
			$name = $row['name'];

			foreach ($packages as $key => $value) {
				if ($name === $value['params']['package']) {
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
