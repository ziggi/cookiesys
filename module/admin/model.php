<?php

class Model_Admin extends Model {

	public function getModuleList() {
		$data = array(
				'news' => array(
						'name' => 'Новости'
					),
				'page' => array(
						'name' => 'Страницы'
					)
			);
		return $data;
	}

}