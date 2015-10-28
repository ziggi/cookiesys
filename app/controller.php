<?php

class Controller
{
	public $model;
	public $view;
	public $request;

	function __construct()
	{
		$this->view = View::getInstance(Config::get()->site->template);
		$this->request = new Request;
	}
}
