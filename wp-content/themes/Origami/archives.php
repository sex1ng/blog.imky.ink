<?php

/**
 * Template Name: Archives
 */
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args  = [ 'paged' => $paged, 'posts_per_page' => 30 ];
query_posts( $args );
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
		if (
			$post_item['post_image'] == false &&
			origami_get_other_thumbnail( $post )
		) {
			$post_item['post_image'] = origami_get_other_thumbnail( $post );
		}
		$post_list[] = $post_item;
	}
}
$pagination = origami_pagination( false );
$count      = wp_count_posts()->publish;

$sidebar_pos = get_option( 'origami_layout_sidebar', 'right' );
if ( $sidebar_pos === 'right' || $sidebar_pos === 'left' ) {
	$post_list_class = 'col-8 col-md-12';
	$sidebar_class   = 'col-4 col-md-12';
	$main_class      = $sidebar_pos == 'left' ? 'flex-rev' : '';
} elseif ( $sidebar_pos === 'none' ) {
	$post_list_class = 'col-10 col-md-12';
	$sidebar_class   = 'd-none';
} elseif ( $sidebar_pos === 'down' ) {
	$post_list_class = 'col-10 col-md-12';
	$sidebar_class   = 'col-10 col-md-12';
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
if ( $post_item['post_image'] == false && origami_get_other_thumbnail( $post ) ) {
	$post_item['post_image'] = origami_get_other_thumbnail( $post );
}

get_header();

$this_year = - 1;

?>
<div id="main-content">
	<?php if ( get_option( 'origami_featured_pages_post_type', 'false' ) != 'true' ) : ?>
        <section class="featured">
            <div class="featured-image" style="background-image:url(<?php echo $post_item['post_image']; ?>)"></div>
            <div class="featured-container">
                <h1>
					<?php echo $post_item['post_title']; ?>
                </h1>
                <h2>
					<?php echo __( '目前共有', 'origami' ) . $count . __( '篇文章', 'origami' ); ?>
                </h2>
            </div>
        </section>
	<?php endif; ?>
    <main class="ori-container columns <?php echo $main_class; ?> grid-md">
        <section class="timeline-list column <?php echo $post_list_class; ?>">
			<?php if ( get_option( 'origami_featured_pages_post_type', 'false' ) == 'true' ) : ?>
				<?php if ( $post_item['post_image'] ) : ?>
                    <div class="p-thumb" style="background-image:url(<?php echo $post_item['post_image']; ?>)"></div>
				<?php endif; ?>
				<?php origami_breadcrumbs(); ?>
                <div class="p-info post-info">
                    <h2 class="card-title"><?php echo $post_item['post_title']; ?></h2>
                    <div class="card-subtitle text-gray">
                        <time><?php echo $post_item['post_date']; ?></time>
                        • <span><?php echo $post_item['post_author']; ?></span> •
                        <span><?php echo $count . __( '篇文章', 'origami' ); ?></span>
                    </div>
                </div>
			<?php endif; ?>
            <article <?php post_class( 'p-content' ); ?> id="post-<?php the_ID(); ?>">
                <div class="clearfix"></div>
				<?php foreach ( get_categories() as $item ) : ?>
                    <h3 id="title-0"><?php echo $item->cat_name ?></h3>
                    <ul class="sitemap-list">
						<?php foreach ( get_posts( "category=" . $item->cat_ID ) as $post ) : ?>
                            <p class="arch_box">
        					    <span style="font-size: 22px;">
        						    <a href="<?php echo $post->guid ?>"><?php echo $post->post_title ?></a>
        					    </span>
                                <span class="arch_time">
        						    <i class="fa fa-calendar"></i>&nbsp;<?php echo $post->post_date ?>
                                </span>
                                <br>
                                <span class="arch_info">
        						<i class="fa fa-user"></i>&nbsp;<?php echo get_the_author(); ?>&nbsp;&nbsp;&nbsp;
        						<i class="fa fa-comment"></i>&nbsp;<?php echo get_comments_number( $post->ID ) ?>条评论&nbsp;&nbsp;&nbsp;
        						<i class="fa fa-bookmark"></i>&nbsp;
                                    <?php $tags = get_the_tags( $post->ID ); ?>
									<?php if ( ! empty( $tags ) ) : ?>
										<?php foreach ( $tags as $tag_key => $tag ) : ?>
											<?php if ( $tag_key != 0 ) {
												echo '/';
											} ?>
                                            <a href="<?php echo get_category_link($tag) ?>" rel="tag">
                                                <?php echo $tag->name ?>
                                            </a>
										<?php endforeach; ?>
									<?php else : ?>
                                        <a href="javascript:void(0);" rel="tag">无标签</a>
									<?php endif; ?>
                                </span>
                                <br>
                                <span class="arch_intro"><?php echo get_the_excerpt( $post->ID ) ?></span>
                            </p>
						<?php endforeach; ?>
                    </ul>
				<?php endforeach; ?>
            </article>
            <ul class="pagination">
                <li class="page-item">
                    <span aria-current="page" class="page-numbers current">1</span>
                </li>
                <li class="page-item">
                    <a class="page-numbers" href="javascript:void(0);">2</a>
                </li>
                <li class="page-item">
                    <a class="next page-numbers" href="javascript:void(0);">下一页
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
			<?php echo $pagination; ?>
        </section>
        <aside class="column ori-sidebar <?php echo $sidebar_class; ?>">
			<?php get_sidebar(); ?>
        </aside>
    </main>
</div>
<?php get_footer(); ?>
