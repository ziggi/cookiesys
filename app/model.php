<?php

class Model extends App {
	
	public $db;

	function __construct() {
		$host = Config::get()->db->host;
		$base = Config::get()->db->base;
		$user = Config::get()->db->user;
		$pass = Config::get()->db->pass;

		$this->db = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
	}

}