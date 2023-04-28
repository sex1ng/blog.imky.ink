<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class SwitchController extends CommonController implements GamesInterface {

	public function getGamerInfo() {
		// TODO: Implement getGamerInfo() method.
	}

	public function getGamerInventory() {
		// TODO: Implement getGamerInventory() method.
	}

	public function getSwitchIframeHtml(): string {
		return 'https://blog.imky.ink/wp-content/themes/Origami/nintendo.html';
	}

}