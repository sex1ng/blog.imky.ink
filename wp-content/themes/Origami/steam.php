<?php

/**
 * Template Name: Steam
 */
query_posts( [ 'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, 'posts_per_page' => 30 ] );
if ( have_posts() ) {
	$post_list = [];
	while ( have_posts() ) {
		the_post();
		$post_author_id = get_post_field( 'post_author', $post->ID );
		global $post_list;
		$post_item = [
			'post_id'        => $post->ID,
			'post_title'     => get_the_title( $post->ID ),
			'post_date'      => get_the_date( get_option( 'date_format' ), $post->ID ),
			'post_year'      => get_the_date( 'Y', $post->ID ),
			'post_month'     => get_the_date( 'm', $post->ID ),
			'post_comments'  => get_comments_number( $post->ID ),
			'post_link'      => get_the_permalink( $post->ID ),
			'post_image'     => wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ),
			'post_image_alt' => get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true ),
			'post_author'    => get_the_author_meta( 'display_name', $post_author_id ),
			'post_category'  => wp_get_post_categories( $post->ID ),
			'post_tag'       => wp_get_post_tags( $post->ID ),
			'post_excerpt'   => get_the_excerpt( $post->ID )
		];
		if ( ! $post_item['post_image'] && origami_get_other_thumbnail( $post ) ) {
			$post_item['post_image'] = origami_get_other_thumbnail( $post );
		}
		$post_list[] = $post_item;
	}
}
$count = wp_count_posts()->publish;

$sidebar_pos = get_option( 'origami_layout_sidebar', 'right' );
if ( $sidebar_pos === 'right' || $sidebar_pos === 'left' ) {
	$post_list_class = 'col-8 col-md-12';
	$sidebar_class   = 'col-4 col-md-12';
	$main_class      = $sidebar_pos == 'left' ? 'flex-rev' : '';
} elseif ( $sidebar_pos === 'none' ) {
	$post_list_class = 'col-10 col-md-12';
	$sidebar_class   = 'd-none';
	$main_class      = '';
} elseif ( $sidebar_pos === 'down' ) {
	$post_list_class = 'col-10 col-md-12';
	$sidebar_class   = 'col-10 col-md-12';
	$main_class      = '';
} else {
	$post_list_class = '';
	$sidebar_class   = '';
	$main_class      = '';
}

if ( get_option( 'origami_links_sidebar', 'true' ) != 'true' ) {
	$sidebar_class = 'd-none';
}

wp_reset_query();

the_post();
$post_author_id = get_post_field( 'post_author', $post->ID );
$post_item      = [
	'post_id'        => $post->ID,
	'post_title'     => get_the_title( $post->ID ),
	'post_date'      => get_the_date( get_option( 'date_format' ), $post->ID ),
	'post_comments'  => get_comments_number( $post->ID ),
	'post_link'      => get_the_permalink( $post->ID ),
	'post_image'     => wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ),
	'post_image_alt' => get_post_meta(
		get_post_thumbnail_id( $post->ID ),
		'_wp_attachment_image_alt',
		true
	),
	'post_author'    => get_the_author_meta( 'display_name', $post_author_id ),
	'post_category'  => wp_get_post_categories( $post->ID ),
	'post_tag'       => wp_get_post_tags( $post->ID ),
	'post_excerpt'   => get_the_excerpt( $post->ID )
];
if ( ! $post_item['post_image'] && origami_get_other_thumbnail( $post ) ) {
	$post_item['post_image'] = origami_get_other_thumbnail( $post );
}

get_header();

?>
<div id="main-content">
	<?php if ( get_option( 'origami_featured_pages_post_type', 'false' ) != 'true' ) : ?>
        <section class="featured">
            <div class="featured-image" style="background-image:url(<?php echo $post_item['post_image']; ?>)"></div>
            <div class="featured-container">
                <h1><?php echo $post_item['post_title']; ?></h1>
            </div>
        </section>
	<?php endif; ?>
    <main class="ori-container columns <?php echo $main_class; ?> grid-md">
        <section class="timeline-list column <?php echo $post_list_class; ?>">
			<?php

			/**
			 * Todo：Steam Web Api
			 */
			class SteamApi {
				public string $apikey = 'C56CCF5590BA7DDC8F1634286231C498';
				public string $steamID = '76561198362785158';
				public string $steamImg = 'https://cdn.akamai.steamstatic.com/steam/apps/753/header.jpg';

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

				public function getSteamUserInfo() {
					$url    = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/';
					$method = 'get';
					$params = [
						'key'      => $this->apikey,
						'steamids' => $this->steamID
					];

					$result = $this->curl( $url, $method, $params );

					return $result['response']['players'][0];
				}

				public function getSteamUserLevel() {
					$url    = 'https://api.steampowered.com/IPlayerService/GetSteamLevel/v1/';
					$method = 'get';
					$params = [
						'key'     => $this->apikey,
						'steamid' => $this->steamID
					];

					$result = $this->curl( $url, $method, $params );

					return $result['response'];
				}
			}

			$steam = new SteamApi();

			$steam_user_info     = $steam->getSteamUserInfo();
			$steam_user_level    = $steam->getSteamUserLevel();
			$steam_default_image = $steam->steamImg;

			?>
            <article style="display: flex; justify-content: space-around; flex-wrap: wrap;"
				<?php post_class( 'p-content' ); ?> id="post-<?php the_ID(); ?>">
                <div class="user-cover">
                    <a href="<?php echo $steam_user_info['profileurl'] ?>" target="_blank"
                       rel="external nofollow noopener noreferrer" style="color: #454545;">
                        <div class="apiava" style="border: 3px solid #454545;">
                            <img src="<?php echo $steam_user_info['avatarfull'] ?>"
                                 alt="<?php echo $steam_user_info['personaname'] ?>"
                                 style="pointer-events: none; cursor: zoom-in;">
                        </div>
                        <div class="apiname"><?php echo $steam_user_info['personaname'] ?></div>
                        <br><br>
                    </a>
                    <div class="apista" title="实时状态" style="color: #454545">
                        上次在线<?php echo date( 'H小时i分钟', $steam_user_info['lastlogoff'] ) ?>前
                    </div>
                    <span class="apilvl">LeveL <?php echo $steam_user_level['player_level'] ?></span>
                    <div class="showgame" id="recentplay" style="display: none;">
                        <div class="gamebox" title="">
                            <img src="<?php echo $steam_default_image ?>" alt="" style="cursor: zoom-in;">
                        </div>
                        <div class="gamebox" title="">
                            <img src="<?php echo $steam_default_image ?>" alt="" style="cursor: zoom-in;">
                        </div>
                    </div>
                </div>
				<?php the_content(); ?>
                <div style="display: block; width: 100%; height: 80px;">
                    <hr>
                    <h2 id="title-0">玩过的就这么几个(82/1199)</h2>
                </div>
                <div class="game-hoder">
                    <div class="game-cover"
                         style="background-image: url(https://media.st.dl.eccdnx.com/steam/apps/270880/library_600x900.jpg);"></div>
                    <div class="game-name">
                        <div class="game-title">American Truck Simulator</div>
                    </div>
                    <a href="https://store.steampowered.com/app/270880/" target="_blank"
                       rel="external nofollow noopener noreferrer" title="American Truck Simulator">
                        <div class="price-block">￥99</div>
                    </a>
                </div>
                <div class="game-hoder" style="background: #000000;">
                    <div class="game-cover" style="background-image: url(/wp-content/uploads/steam/logo.png);"></div>
                    <div class="game-name">
                        <div class="game-title"></div>
                    </div>
                    <a href="" target="_blank"
                       rel="external nofollow noopener noreferrer" title="我的Steam主页">
                        <div class="price-block">全部库存</div>
                    </a>
                </div>
            </article>

            <div class="p-comments">
				<?php comments_template(); ?>
            </div>
        </section>
        <aside class="column ori-sidebar <?php echo $sidebar_class; ?>">
			<?php get_sidebar(); ?>
        </aside>
    </main>
</div>
<?php get_footer(); ?>
