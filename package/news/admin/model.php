<?php

class Model_News_Admin extends Model
{
	public function add($name, $title, $text)
	{
		$result = $this->db->query("INSERT INTO `news` (`name`, `title`, `text`) VALUES ('$name', '$title', '$text')");

		return $result;
	}
}
