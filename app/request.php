<?php

class Request
{
	public function getPost($key, $pattern)
	{
		return $_POST[$key];
	}

	public function getGet($key, $pattern)
	{
		return $_GET[$key];
	}
}
