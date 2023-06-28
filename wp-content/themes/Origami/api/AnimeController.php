<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class AnimeController extends CommonController implements GamesInterface {

	public function getGamerInfo() {
		// TODO: Implement getGamerInfo() method.
	}

	public function getGamerInventory( int $page = 1, int $limit = 24 ): array {
		global $wpdb, $wp_query;

		list( $pid, $limit, $offset ) = [ 0, $limit, ( $page - 1 ) * $limit ];

		$wp_query->max_num_pages = ceil( $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
							COUNT(*) AS count
						FROM
						    wp_animation
						WHERE
							`anime_pid` = %d", $pid
				)
			)[0]->count / $limit );

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
    						p.`anime_id`,
    						p.`anime_pid`,
    						p.`anime_title`,
    						p.`anime_website`,
    						p.`anime_image`,
    						p.`anime_schedule`,
    						p.`anime_description`,
							CASE p.`anime_type` WHEN 1 THEN '番剧' WHEN 2 THEN '电影' WHEN 3 THEN '国漫' ELSE '未知' END AS anime_type,
    						p.`anime_creator`,
    						SUBSTR(p.`anime_date`, 1, 10) AS anime_date,
							CONCAT('全', p.`anime_episode`, '话') AS anime_episode,
    						IF (p.`anime_status` = 1, '已看完', '未看完') AS anime_status, ( 
							SELECT
								JSON_ARRAYAGG( 
								    JSON_OBJECT( 
								        'anime_id', c.`anime_id`, 
								        'anime_pid', c.`anime_pid`, 
								        'anime_title', c.`anime_title`, 
								        'anime_website', c.`anime_website`, 
								        'anime_image', c.`anime_image`, 
								        'anime_schedule', c.`anime_schedule`, 
								        'anime_description', c.`anime_description`, 
								        'anime_type', CASE c.`anime_type` WHEN 1 THEN '番剧' WHEN 2 THEN '电影' WHEN 3 THEN '国漫' ELSE '未知' END, 
								        'anime_creator', c.`anime_creator`, 
								        'anime_date', SUBSTR(c.`anime_date`, 1, 10), 
								        'anime_episode', CONCAT('全', c.`anime_episode`, '话'), 
								        'anime_status', IF (c.`anime_status` = 1, '已看完', '未看完')
								        ) 
								    ) 
							FROM
								wp_animation c 
							WHERE
								c.`anime_pid` = p.`anime_id` 
							) AS anime_subdata 
						FROM
							wp_animation p 
						WHERE
							p.`anime_pid` = %d 
						GROUP BY
							p.`anime_id` 
						ORDER BY
							p.`anime_id` ASC 
						LIMIT %d 
						OFFSET %d",
				$pid, $limit, $offset
			)
		);
	}

}