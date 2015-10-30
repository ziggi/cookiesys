<?php

class Model_Page extends Model
{
	function get($page_name)
	{
		$sth = $this->db->prepare("SELECT name, title, text FROM page WHERE name = ?");

		if (!$sth->execute([$page_name]) || $sth->rowCount() == 0) {
			return false;
		}

		$result = $sth->fetch();

		$data = [
				'name' => $result['name'],
				'title' => $result['title'],
				'text' => $result['text'],
			];

		return $data;
	}
}
