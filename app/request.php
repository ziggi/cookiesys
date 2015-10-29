<?php

class Request extends App
{
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
	const METHOD_SESSION = 'SESSION';

	function __construct()
	{
		if (!$this->isAfterRedirect()) {
			$this->unsetParam('redirect', Request::METHOD_SESSION);
		}
	}

	public function getAll($method)
	{
		if (isset($GLOBALS['_' . $method])) {
			return $GLOBALS['_' . $method];
		}

		return false;
	}

	public function getParam($key, $method = Request::METHOD_POST)
	{
		if (isset($GLOBALS['_' . $method][$key])) {
			return $GLOBALS['_' . $method][$key];
		}

		return false;
	}

	public function setParam($key, $value, $method)
	{
		if (isset($GLOBALS['_' . $method])) {
			$GLOBALS['_' . $method][$key] = $value;
		}

		return false;
	}

	public function unsetParam($key, $method)
	{
		if (isset($GLOBALS['_' . $method])) {
			unset($GLOBALS['_' . $method][$key]);
			return true;
		}

		return false;
	}

	public function isAfterRedirect()
	{
		return $this->getParam('after_redirect', Request::METHOD_SESSION);
	}

	public function redirect(array $params)
	{
		list($package, $action) = explode('/', $params[0]);
		$data = isset($params['data']) ? $params['data'] : null;

		$package_info = $this->route()->getRule('/^\/' . $package . '\/' . $action . '\/?$/')[0];
		
		$this->setParam('after_redirect', 1, Request::METHOD_SESSION);
		$this->setParam('redirect', [$package_info['params']['package'] => $data], Request::METHOD_SESSION);

		header('Location: '. Config::get()->uri->site . $package_info['pattern']);
	}
}
