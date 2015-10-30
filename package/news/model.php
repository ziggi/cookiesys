<?php

class Model_News extends Model
{
	function getAll()
	{
		$query = "SELECT
		            `name`, `title`, `text`
		          FROM
		            `news`";

		$result = $this->db->query($query);

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
		$query = "SELECT
		            `name`, `title`, `text`
		          FROM
		            `news`
		          WHERE
		            `name` = ?";

		$sth = $this->db->prepare($query);

		if (!$sth->execute([$news_name]) || $sth->rowCount() == 0) {
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
