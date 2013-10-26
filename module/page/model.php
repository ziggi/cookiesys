<?php

class Model_Page extends Model {

	function get($page_name) {
		$result = $this->db->query("SELECT * FROM `page` WHERE `name`='$page_name'");

		if ($result === false || $result->num_rows == 0) {
			$data['errorMsg'] = 'Страница не найдена';
			return $data;
		}
		
		$array = $result->fetch_assoc();
		$data = array(
				'name' => $array['name'],
				'title' => $array['title'],
				'text' => $array['text'],
			);
		
		return $data;
	}
}