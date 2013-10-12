<?php

include_once 'Smarty-3.1.14/Smarty.class.php';

class View implements iView {

	public function render($data = null, $module = null, $file = 'template.tpl') {
		$smarty = new Smarty();

		$smarty->setTemplateDir(Config::get()->path->template . '/' . Config::get()->site->template);
		$smarty->setCompileDir(__DIR__ . '/templates_c');
		$smarty->setCacheDir(__DIR__ . '/cache');
		$smarty->setConfigDir(__DIR__ . '/configs');

		$smarty->assign('uri', Config::get()->uri->returnArray());
		$smarty->assign('data', $data);

		if (isset($data['errorMsg'])) {
			$smarty->display('404.tpl');
		} else {
			if ($module === null) {
				$smarty->display($file);
			} else {
				$smarty->display(Config::get()->path->module . '/' . $module . '/' . $file);
			}
		}
	}

}