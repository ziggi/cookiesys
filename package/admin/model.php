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
			return false;
		}

		$data = [];

		$packages = $this->route()->getRule('/^\/admin\/.*$/');

		while ($row = $result->fetch()) {
			$name = $row['name'];

			foreach ($packages as $key => $value) {
				if ($name === $value['params']['package']) {
					$data[ $name ] = [
							'title' => $row['title'],
							'description' => $row['description'],
						];
				}
			}
		}

		return $data;
	}
}
