<?php

class Model_News extends Model
{
	function getAll()
	{
		$result = $this->db->query("SELECT `name`, `title`, `text` FROM `news`");

		if ($result === false || $result->rowCount() == 0) {
			return false;
		}

		$data = [];

		while ($row = $result->fetch()) {
			$data[] = [
					'name' => $row['name'],
					'title' => $row['title'],
					'text' => $row['text'],
				];
		}

		return $data;
	}

	function get($news_name)
	{
		$result = $this->db->query("SELECT `name`, `title`, `text` FROM `news` WHERE `name` = '$news_name'");

		if ($result === false || $result->rowCount() == 0) {
			return false;
		}

		$array = $result->fetch();

		$data = [
				'name' => $array['name'],
				'title' => $array['title'],
				'text' => $array['text'],
			];

		return $data;
	}
}
