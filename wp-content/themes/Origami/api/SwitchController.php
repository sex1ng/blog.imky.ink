<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class SwitchController extends CommonController implements GamesInterface {

	public function getGamerInfo() {
		// TODO: Implement getGamerInfo() method.
	}

	public function getGamerInventory(): array {

		return [
			[
				'name'     => '集合啦！动物森友会',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/04/ds.jpg',
				'shop_url' => 'https://www.nintendo.com.hk/switch/animal_crossing_new_horizons/happyhomeparadise/',
			],
			[
				'name'     => '宝可梦 剑',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/05/pkmj.jpg',
				'shop_url' => 'https://game.portal-pokemon.com/sword_shield/tc/',
			],
			[
				'name'     => '塞尔达传说：旷野之息',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/05/zelda.webp',
				'shop_url' => 'https://www.nintendo.co.jp/zelda/totk/index.html',
			],
			[
				'name'     => '宝可梦传说 阿尔宙斯',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/05/pkma.jpg',
				'shop_url' => 'https://www.pokemon.co.jp/ex/legends_arceus/tc/',
			],
			[
				'name'     => '怪物猎人：崛起',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/05/monster.jpg',
				'shop_url' => 'https://ec.nintendo.com/HK/zh/titles/70010000029013',
			],
			[
				'name'     => '宝可梦 朱',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/05/pkmz.webp',
				'shop_url' => 'https://www.pokemon.co.jp/ex/sv/tc/',
			],
			[
				'name'     => '火影忍者疾风传 终极风暴4 慕留人传',
				'bg_url'   => 'https://blog.imky.ink/wp-content/uploads/2023/05/naruto.jpg',
				'shop_url' => 'https://ec.nintendo.com/HK/zh/titles/70010000016050',
			]
		];
	}

	public function getSwitchIframeHtml(): string {
		return 'https://blog.imky.ink/wp-content/themes/Origami/nintendo.html';
	}

}