<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class AnimeController extends CommonController implements GamesInterface {

	public function getGamerInfo() {
		// TODO: Implement getGamerInfo() method.
	}

	public function getGamerInventory(): array {
		global $wpdb;

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
    						p.anime_id,
    						p.anime_pid,
    						p.anime_title,
    						p.anime_website,
    						p.anime_image,
    						p.anime_schedule,
    						p.anime_description,
    						p.anime_type,
    						p.anime_creator,
    						SUBSTR(p.anime_date, 1, 10) AS anime_date,
							CONCAT('全', p.anime_episode, '话') AS anime_episode,
    						IF(p.anime_status = 1, '已看完', '未看完') AS anime_status, ( 
							SELECT
								JSON_ARRAYAGG( 
								    JSON_OBJECT( 
								        'anime_id', c.anime_id, 
								        'anime_pid', c.anime_pid, 
								        'anime_title', c.anime_title, 
								        'anime_website', c.anime_website, 
								        'anime_image', c.anime_image, 
								        'anime_schedule', c.anime_schedule, 
								        'anime_description', c.anime_description, 
								        'anime_type', c.anime_type, 
								        'anime_creator', c.anime_creator, 
								        'anime_date', c.anime_date, 
								        'anime_episode', c.anime_episode, 
								        'anime_status', c.anime_status
								        ) 
								    ) 
							FROM
								wp_animation c 
							WHERE
								c.anime_pid = p.anime_id 
							) AS anime_subdata 
						FROM
							wp_animation p 
						WHERE
							p.anime_pid = %d",
				0
			)
		);
	}

}