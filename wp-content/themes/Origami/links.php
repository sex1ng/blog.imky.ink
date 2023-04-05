<?php

/**
 * Template Name: Links
 */
$sidebar_pos = get_option('origami_layout_sidebar', 'right');
if ($sidebar_pos === 'right' || $sidebar_pos === 'left') {
  $post_list_class = 'col-8 col-md-12';
  $sidebar_class = 'col-4 col-md-12';
  $main_class = $sidebar_pos == 'left' ? 'flex-rev' : '';
} elseif ($sidebar_pos === 'none') {
  $post_list_class = 'col-10 col-md-12';
  $sidebar_class = 'd-none';
} elseif ($sidebar_pos === 'down') {
  $post_list_class = 'col-10 col-md-12';
  $sidebar_class = 'col-10 col-md-12';
}

if (get_option('origami_links_sidebar', 'true') != 'true') {
  $sidebar_class = 'd-none';
}

$links = get_bookmarks();
function retain_key_shuffle(array &$arr)
{
  if (!empty($arr)) {
    $key = array_keys($arr);
    shuffle($key);
    foreach ($key as $value) {
      $arr2[$value] = $arr[$value];
    }
    $arr = $arr2;
  }
}
retain_key_shuffle($links);

$count = count($links);

foreach ($links as $link) {
  $name_arr = explode(',', $link->link_name);
  $link->link_name = $name_arr[0];
  $link->link_author = $name_arr[1];
  $image_arr = explode(',', $link->link_image);
  $link->link_image = $image_arr[0];
  $link->link_avatar = $image_arr[1];
}
wp_reset_query();

the_post();
$post_author_id = get_post_field('post_author', $post->ID);
$post_item = [
  'post_id' => $post->ID,
  'post_title' => get_the_title($post->ID),
  'post_date' => get_the_date(get_option('date_format'), $post->ID),
  'post_comments' => get_comments_number($post->ID),
  'post_link' => get_the_permalink($post->ID),
  'post_image' => wp_get_attachment_url(get_post_thumbnail_id($post->ID)),
  'post_image_alt' => get_post_meta(
    get_post_thumbnail_id($post->ID),
    '_wp_attachment_image_alt',
    true
  ),
  'post_author' => get_the_author_meta('display_name', $post_author_id),
  'post_category' => wp_get_post_categories($post->ID),
  'post_tag' => wp_get_post_tags($post->ID),
  'post_excerpt' => get_the_excerpt($post->ID)
];
if ($post_item['post_image'] == false && origami_get_other_thumbnail($post)) {
  $post_item['post_image'] = origami_get_other_thumbnail($post);
}

get_header();
?>
<div id="main-content">
  <?php if (get_option('origami_featured_pages_post_type', 'false') != 'true') : ?>
    <section class="featured">
      <div class="featured-image" style="background-image:url(<?php echo $post_item['post_image']; ?>)"></div>
      <div class="featured-container">
        <h1>
          <?php echo $post_item['post_title']; ?>
        </h1>
        <h2>
          <?php echo __('目前共有', 'origami') .
            $count .
            __('个友链', 'origami'); ?>
        </h2>
      </div>
    </section>
  <?php endif; ?>
  <main class="ori-container columns <?php echo $main_class; ?> grid-md">
    <section class="links-list column <?php echo $post_list_class; ?>">
      <?php if (get_option('origami_featured_pages_post_type', 'false') == 'true') : ?>
        <?php if ($post_item['post_image']) : ?>
          <div class="p-thumb" style="background-image:url(<?php echo $post_item['post_image']; ?>)"></div>
        <?php endif; ?>
        <?php origami_breadcrumbs(); ?>
        <div class="p-info post-info">
          <h2 class="card-title"><?php echo $post_item['post_title']; ?></h2>
          <div class="card-subtitle text-gray">
            <time><?php echo $post_item['post_date']; ?></time> • <span><?php echo $post_item['post_author']; ?></span> •
            <span><?php echo $count . __('个友链', 'origami'); ?></span>
          </div>
        </div>
      <?php endif; ?>
      <article <?php post_class('p-content'); ?> id="post-<?php the_ID(); ?>">
        <?php the_content(); ?>
      </article>
      <ul class="links columns grid-md">
        <?php foreach ($links as $link) : ?>
          <li class="column col-6 col-md-12">
            <div class="links-card">
              <a class="links-header" href="<?php echo $link->link_url; ?>" target="_blank">
                <div class="links-image" style="background-image:url(<?php echo $link->link_image ? $link->link_image : 'https://lab.ixk.me/api/bing?size=400x240&day=' . rand(-1, 7); ?>)"></div>
                <?php if ($link->link_avatar) : ?>
                  <img class="links-avatar avatar avatar-xl" src="<?php echo $link->link_avatar; ?>" />
                <?php endif; ?>
                <div class="links-name"><?php echo $link->link_name; ?></div>
              </a>
              <div class="links-content">
                <div class="links-author">
                  <?php echo $link->link_author
                    ? $link->link_author
                    : '&nbsp'; ?>
                </div>
                <div class="links-notes text-gray">
                  <?php echo $link->link_notes; ?>
                </div>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
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
