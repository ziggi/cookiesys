<?php


class Module extends App {

	public function loadAll() {
		foreach (scandir("module/") as $module_name) {
			if ($module_name == "." || $module_name == "..") {
				continue;
			}
			
			$include_file = "module/" . $module_name . "/" . $module_name . ".php";
			
			if (file_exists($include_file)) {
				include_once $include_file;
			} else {
				throw new Exception("Модуль " . $module_name . " не загружен");
			}
		}
	}
}