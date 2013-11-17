<?php

class Model_News extends Model {

	function getAll() {
		$result = $this->db->query("SELECT * FROM `news`");

		if ($result === false || $result->num_rows == 0) {
			$data['errorMsg'] = 'Новостей нет';
			return $data;
		}
		
		$data = array();

		while ($array = $result->fetch_assoc()) {
			$data[] = array(
					'name' => $array['name'],
					'title' => $array['title'],
					'text' => $array['text'],
				);
		}

		return $data;
	}

	function get($news_name) {
		$result = $this->db->query("SELECT * FROM `news` WHERE `name`='$news_name'");

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