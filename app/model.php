<?php

class Model {
	
	public $db;

	function __construct() {
		$this->db = new mysqli('127.0.0.1', 'root', 'root', 'cookiesys');
	}

}