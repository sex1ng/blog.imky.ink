<?php

class Common {

	/**
	 * @var Redis
	 */
	private $redis = 'redis';

	/**
	 * @return Redis|string
	 */
	public function getRedisInstance() {
		if ( ! ( $this->redis instanceof Redis ) ) {
			$this->redis = new Redis();
			try {
				$this->redis->connect( '127.0.0.1' );
				if ( $this->redis->ping() ) {
					$this->redis->select( 1 );
				}
			} catch ( RedisException $e ) {
				return $e->getMessage();
			}
		}

		return $this->redis;
	}

	/**
	 * @param string $url
	 * @param string $method
	 * @param array $params
	 * @param array $body
	 *
	 * @return mixed
	 */
	public function curl( string $url, string $method = 'get', array $params = [], array $body = [] ) {
		$method     = trim( $method );
		$queryParam = '';
		if ( ! empty( $params ) ) {
			foreach ( $params as $key => $value ) {
				if ( empty( $queryParam ) ) {
					$symbol = '?';
				} else {
					$symbol = '&';
				}
				$queryParam .= "{$symbol}{$key}=$value";
			}
		}
		$curl = curl_init();
		curl_setopt( $curl, CURLOPT_URL, $url . "{$queryParam}" );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		if ( $method == 'post' ) {
			curl_setopt( $curl, CURLOPT_POST, 1 );
			curl_setopt( $curl, CURLOPT_POSTFIELDS, $body );
		}
		$response = curl_exec( $curl );
		$code     = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
		curl_close( $curl );

		return json_decode( $response, true );
	}
}
