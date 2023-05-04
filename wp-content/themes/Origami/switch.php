<?php

/**
 * Template Name: Switch
 */
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

require_once get_template_directory() . '/api/SwitchController.php';

$switch = new SwitchController();

$switch_iframe_uri = $switch->getSwitchIframeHtml();
$gamer_inventory   = $switch->getGamerInventory();

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
            <article style="display: flex; justify-content: space-around; flex-wrap: wrap;"
				<?php post_class( 'p-content' ); ?> id="post-<?php the_ID(); ?>">
                <iframe style="border: none; display: block; margin: 0 auto; overflow: hidden;"
                        frameborder="no" width="100%" height="320px"
                        src="<?php echo $switch_iframe_uri ?>">
                </iframe>
				<?php the_content(); ?>
                <div style="width: 100%; height: 80px;">
                    <h2 id="title-0">收藏卡带</h2>
                </div>
				<?php foreach ( $gamer_inventory as $value ) : ?>
                    <div class="game-hoderns" style="background: #595959;">
                        <div class="game-coverns"
                             style="background: url(<?php echo $value['bg_url'] ?>) 0% 0% / cover;"></div>
                        <div class="game-namens">
                            <div class="game-titlens"><?php echo $value['name'] ?></div>
                        </div>
                        <a href="<?php echo $value['shop_url'] ?>" target="_blank"
                           rel="external nofollow noopener noreferrer" title="<?php echo $value['name'] ?>">
                            <div class="price-blockns">查看</div>
                        </a>
                    </div>
				<?php endforeach; ?>
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
