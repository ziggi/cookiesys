<?php

class Model_News_Admin extends Model
{
	public function add($name, $title, $text)
	{
		$query = "INSERT INTO
		            `news` (`name`, `title`, `text`)
		          VALUES
		            (?, ?, ?)";

		$sth = $this->db->prepare($query);

		return $sth->execute([$name, $title, $text]);
	}
}
