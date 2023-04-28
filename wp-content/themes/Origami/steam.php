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

			require_once get_template_directory() . '/SteamApi.php';

			$steam = new SteamApi();

			$steam_user_info      = $steam->getSteamUserInfo();
			$steam_user_level     = $steam->getSteamUserLevel();
			$steam_default_image  = $steam->getSteamCardImage();
			$steam_recent_play    = $steam->getSteamRecentPlay();
			$steam_inventory      = $steam->getSteamInventory();
			$steam_index_page_uri = $steam->getSteamIndexPageUri();
			$steam_app_price      = $steam->getSteamAppPrice();

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
                    <span class="apilvl">LeveL&nbsp;<?php echo $steam_user_level['player_level'] ?></span>
                    <div class="showgame" id="recentplay">
						<?php foreach ( $steam_recent_play['games'] as $key => $value ) : ?>
                            <div class="gamebox" title="">
                                <img src="<?php echo $value['image_src'] ?>" alt="" style="cursor: zoom-in;"
                                     onerror="this.src='<?php echo $steam_default_image ?>'">
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
				<?php the_content(); ?>
                <div style="display: block; width: 100%; height: 80px;">
                    <hr>
                    <h2 id="title-0">游戏展柜(<?php echo $steam_inventory['game_count'] ?>/167)</h2>
                </div>
				<?php foreach ( $steam_inventory['games'] as $key => $value ) : ?>
                    <div class="game-hoder">
                        <div class="game-cover" style="background-image:url(<?php echo $value['bg_img'] ?>);"></div>
                        <div class="game-name">
                            <div class="game-title"><?php echo $value['name'] ?></div>
                        </div>
                        <a href="<?php echo $value['shop_url'] ?>" target="_blank"
                           rel="external nofollow noopener noreferrer" title="<?php echo $value['name'] ?>">
                            <div class="price-block"><?php
								echo $steam_app_price[ $value['appid'] ]['data']['price_overview']['initial_formatted']
									?: $steam_app_price[ $value['appid'] ]['data']['price_overview']['final_formatted']
										?: '¥ 00.00'
								?></div>
                        </a>
                    </div>
				<?php endforeach; ?>
                <div class="game-hoder" style="background: #000000;">
                    <div class="game-cover" style="background-image: url(/wp-content/uploads/2023/04/logo.png);"></div>
                    <div class="game-name">
                        <div class="game-title"></div>
                    </div>
                    <a href="<?php echo $steam_index_page_uri ?>" target="_blank"
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
