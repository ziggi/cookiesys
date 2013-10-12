<?php

class Controller_News {
	public function showAll() {
		echo "showing all news";
	}
	public function showOne($param) {
		echo "showing one news";
		print_r($param);
	}
}