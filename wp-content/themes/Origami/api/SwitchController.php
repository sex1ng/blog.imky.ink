<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class SwitchController extends CommonController implements GamesInterface {

	public function getGamerInfo() {
		// TODO: Implement getGamerInfo() method.
	}

	public function getGamerInventory() {

		return [
			[
				'name'     => '集合啦！动物森友会',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/04/ds.jpg',
				'shop_url' => 'https://www.nintendo.co.jp/switch/acbaa/index.html',
			],
			[],
			[],
			[],
			[],
			[],
		];
	}

	public function getSwitchIframeHtml(): string {
		return 'https://blog.imky.ink/wp-content/themes/Origami/nintendo.html';
	}

}