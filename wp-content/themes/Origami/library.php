<?php

/**
 * Template Name: Library
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

require_once get_template_directory() . '/api/LibraryController.php';

$book = new LibraryController();

$book_inventory = $book->getGamerInventory();

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
				<?php the_content(); ?>

                <div id="bookshell" style="width: 100%;">
                    <ul class="book_align">
                        <li>
                            <figure class="book">
                                <!-- Front -->
                                <ul class="hardcover_front">
                                    <li>
                                        <img src="/wp-content/uploads/2023/06/s3924279.jpg" alt=""
                                             style="max-width: calc(100% + 9px); width: calc(100% + 9px); position: relative; left: -2px; cursor: zoom-in;">
                                    </li>
                                    <li></li>
                                </ul>
                                <!-- Pages -->
                                <ul class="book_page">
                                    <li>
                                        <img src="/wp-content/uploads/2023/06/sblank.jpg" alt=""
                                             style="cursor: zoom-in;">
                                    </li>
                                    <li>
                                        <img src="/wp-content/uploads/2023/06/s3924279-4.jpg" alt=""
                                             style="cursor: zoom-in;">
                                    </li>
                                    <li>
                                        <img src="/wp-content/uploads/2023/06/s3924279-3.jpg" alt=""
                                             style="cursor: zoom-in;">
                                    </li>
                                    <li>
                                        <img src="/wp-content/uploads/2023/06/s3924279-2.jpg" alt=""
                                             style="cursor: zoom-in;">
                                    </li>
                                    <li>
                                        <img src="/wp-content/uploads/2023/06/s3924279-1.jpg" alt=""
                                             style="cursor: zoom-in;">
                                    </li>
                                </ul>
                                <!-- Back -->
                                <ul class="hardcover_back">
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="book_spine">
                                    <li></li>
                                    <li></li>
                                </ul>
                                <figcaption id="bookinfo">
                                    <h1 id="title-0">我兔斯基你</h1>
                                    <span>王卯卯·阳光出版社</span>
                                    <p>
                                        兔斯基是一只面无表情，完全靠肢体动作来表达情绪的兔子，几乎囊括了80后和90后的所有特征：富有想象力、自娱自乐、独立特行、反传统。
                                        也自带80后和90后所少有的优点：雍容、睿智、洒脱、富有洞察力。
                                        虽然看起来很困顿，内心却是很敏锐、强大、积极，那对象征性的眯眼和软耳，具有独特的解压作用，能消解人心灵负重。
                                        它自己的人生观和世界观已经能够成一种人生哲学，基本上可用一句话概括它的形象价值：用情绪改善人生，用想象力改变世界。
                                    </p>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
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
