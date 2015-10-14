<?php

class Controller
{
	public $model;
	public $view;

	function __construct()
	{
		$this->view = View::getInstance(Config::get()->site->template);
	}
}
