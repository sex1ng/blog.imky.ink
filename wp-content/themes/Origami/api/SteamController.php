<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class SteamController extends CommonController implements GamesInterface {
	public string $apikey = 'C56CCF5590BA7DDC8F1634286231C498';
	public string $steamID = '76561198362785158';

	public array $appids_filter = [
		730,            // CSGO
		578080,         // PUBG
		271590,         // GTAV
		230410,         // Warframe
		381210,         // Dead By Daylight
		359550,         // Rainbowsixsiege
		457140,         // oxygen
		779340,         // Total War THREE KINGDOMS
		1172470,        // APEX
		292030,         // The Witcher III
		431960,         // Wallpaper Engine
		105600,         // Terraria
		322330,         // Don't Starve Together
		582160,         // Assassin's Creed® Origins
		1468810,        // 鬼谷八荒
		570,            // Dota 2
		377160,         // Fallout 4
		994280,         // Gujian 3
		1568590,        // Goose Goose Duck
		255710,         // Cities Skylines
		1091500,        // 2077
		239140,         // Dying Light
		601150,         // Devil May Cry V
		220440,         // DmC
		582010,         // Monster Hunter World
		1644960,        // NBA 2K22
		1203220,        // 永劫无间
		1222670,        // The Sims 4
		736190,         // Chinese Parents
		329050,         // Devil May Cry 4 Special Edition
		998940,         // 隐形守护者
		391220,         // Rise of the Tomb Raider
		477160,         // Human Fall Flat
		346110,         // ARK Survival Evolved
		1296830,        // Warm Snow
		812140,         // Assassin's Creed® Odyssey
		1139900,        // Ghostrunner
		227300,         // Euro Truck Simulator 2
		333600,         // NEKOPARA Vol 1
		1832640,        // Mirror 2 Project X
		1262580,        // Need for Speed Payback
		1097150,        // 糖豆人
		49520,          // Borderlands 2
		1238810,        //  Battlefield™ V
		696170,         // SENRAN KAGURA Peach Beach Splash
	];

	/**
	 * 获取用户信息
	 * @return mixed
	 * @throws RedisException
	 */
	public function getGamerInfo() {
		$redis = $this->getRedisInstance();
		if ( ! $redis->hExists( 'player', 'steamid' ) ) {
			$url    = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/';
			$method = 'get';
			$params = [
				'key'      => $this->apikey,
				'steamids' => $this->steamID
			];
			$result = $this->curl( $url, $method, $params );
			$redis->hMSet( 'player', $result['response']['players'][0] );

			return $result['response']['players'][0];
		} else {
			return $redis->hGetAll( 'player' );
		}
	}

	/**
	 * 获取社区等级
	 * @return mixed
	 * @throws RedisException
	 */
	public function getGamerLevel() {
		$redis = $this->getRedisInstance();
		if ( ! $redis->exists( 'player_level' ) ) {
			$url    = 'https://api.steampowered.com/IPlayerService/GetSteamLevel/v1/';
			$method = 'get';
			$params = [
				'key'     => $this->apikey,
				'steamid' => $this->steamID
			];
			$result = $this->curl( $url, $method, $params );
			$redis->set( 'player_level', $result['response']['player_level'] );

			return $result['response'];

		} else {
			return [ 'player_level' => $redis->get( 'player_level' ) ];
		}
	}

	/**
	 * 获取近期游玩
	 * @return mixed
	 * @throws RedisException
	 */
	public function getGamerRecentPlay() {
		$redis = $this->getRedisInstance();
		if ( ! $redis->hExists( 'recent_game_1', 'appid' ) ) {
			$url    = 'https://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v1/';
			$method = 'get';
			$params = [
				'key'     => $this->apikey,
				'steamid' => $this->steamID
			];
			$result = $this->curl( $url, $method, $params );

			foreach ( $result['response']['games'] as $key => $value ) {
				$result['response']['games'][ $key ]['image_src'] = 'https://cdn.akamai.steamstatic.com/steam/apps/' . $value['appid'] . '/header.jpg';
			}

			for ( $i = 0; $i < $result['response']['total_count']; $i ++ ) {
				$redis->hMSet( 'recent_game_' . ( $i + 1 ), $result['response']['games'][ $i ] );
			}

			if ( count( $result['response']['games'] ) == 1 ) {
				$result['response']['games'][] = [];
			}

			return $result['response'];
		} else {
			$games   = [];
			$games[] = $redis->hGetAll( 'recent_game_1' );
			if ( $redis->hExists( 'recent_game_2', 'appid' ) ) {
				$games[] = $redis->hGetAll( 'recent_game_2' );
			} else {
				$games[] = [];
			}

			return [ 'total_count' => count( $games ), 'games' => $games ];
		}
	}

	/**
	 * 获取游戏库存
	 * @return mixed
	 * @throws RedisException
	 */
	public function getGamerInventory() {
		$redis = $this->getRedisInstance();
		if ( ! ( $redis->sCard( 'inventory' ) > 0 ) ) {
			$url    = 'https://api.steampowered.com/IPlayerService/GetOwnedGames/v1/';
			$method = 'get';
			$params = [
				'key'        => $this->apikey,
				'format'     => 'json',
				'input_json' => urlencode( json_encode( [
					'steamid'                   => $this->steamID,
					'include_appinfo'           => true,
					'include_played_free_games' => true,
					'appids_filter'             => $this->appids_filter
				] ) )
			];

			$result = $this->curl( $url, $method, $params );

			foreach ( $result['response']['games'] as $key => $value ) {
				$result['response']['games'][ $key ]['bg_img']   = 'https://media.st.dl.eccdnx.com/steam/apps/' . $value['appid'] . '/library_600x900.jpg';
				$result['response']['games'][ $key ]['shop_url'] = 'https://store.steampowered.com/app/' . $value['appid'] . '/';
			}

			foreach ( $result['response']['games'] as $value ) {
				$redis->sAdd( 'inventory', serialize( $value ) );
			}

			$response = $result['response'];
		} else {
			$games = $redis->sMembers( 'inventory' );
			foreach ( $games as $key => $value ) {
				$games[ $key ] = unserialize( $value );
			}

			$response = [
				'game_count' => $redis->sCard( 'inventory' ),
				'games'      => $games
			];
		}
		$playtime = array_column( $response['games'], 'playtime_forever' );
		array_multisort( $playtime, SORT_DESC, $response['games'] );

		return $response;
	}

	/**
	 * 获取游戏价格
	 * @return mixed
	 * @throws RedisException
	 */
	public function getGamesAppPrice() {
		$redis = $this->getRedisInstance();
		if ( ! $redis->exists( 'price_overview' ) ) {
			$url    = 'https://store.steampowered.com/api/appdetails/';
			$method = 'get';
			$params = [
				'appids'  => implode( ',', $this->appids_filter ),
				'filters' => 'price_overview'
			];

			$result   = $this->curl( $url, $method, $params );
			$overview = [];
			foreach ( $result as $key => $value ) {
				$overview[ $key ] = serialize( $value );
			}

			$redis->hMSet( 'price_overview', $overview );

			return $result;
		} else {
			$overview = $redis->hGetAll( 'price_overview' );
			foreach ( $overview as $key => $value ) {
				$overview[ $key ] = unserialize( $value );
			}
			return $overview;
		}
	}

	/**
	 * @return string
	 */
	public function getSteamCardImage(): string {
		return 'https://blog.imky.ink/wp-content/uploads/2023/04/header.jpg';
	}

	/**
	 * @return string
	 */
	public function getGamerIndexPageUri(): string {
		return 'https://steamcommunity.com/profiles/76561198362785158/games/?tab=all';
	}

}