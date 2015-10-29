<?php

class Validator
{
	private $_params;
	private $_rules;

	function __construct(array $params, array $rules)
	{
		// rules for validation
		$this->_rules = [
			'string' => function ($value) {
				return preg_match('/^[a-zа-яё0-9\-]+$/iu', $value);
			},
			'required' => function ($value) {
				return !empty($value);
			}
		];

		// add item in array
		foreach ($params as $param => $value) {
			$this->_params[$param]['value'] = $value;
			$this->_params[$param]['rules'] = $rules[$param];
		}

		return $this;
	}

	public function isValidParam($value, $rule)
	{
		if (isset($this->_rules[$rule])) {
			return $this->_rules[$rule]($value);
		}
		return false;
	}

	public function isValid()
	{
		$is_valid = true;

		foreach ($this->_params as $name => &$params) {
			$value = $params['value'];
			$rules = $params['rules'];

			foreach ($rules as $rule) {
				if (!$this->isValidParam($value, $rule)) {
					$params['errors'][] = $rule;
					$is_valid = false;
				}
			}
		}

		return $is_valid;
	}

	public function getInfo()
	{
		return $this->_params;
	}

	public function getParam($name)
	{
		if (isset($this->_params[$name]['value'])) {
			return $this->_params[$name]['value'];
		}

		return false;
	}
}
