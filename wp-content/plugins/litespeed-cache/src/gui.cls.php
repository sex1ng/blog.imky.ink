<?php
/**
 * The frontend GUI class.
 *
 * @since      	1.3
 * @subpackage 	LiteSpeed/src
 * @author     	LiteSpeed Technologies <info@litespeedtech.com>
 */
namespace LiteSpeed;
defined( 'WPINC' ) || exit;

class GUI extends Base {
	private static $_clean_counter = 0;

	private $_promo_true;

	// [ file_tag => [ days, litespeed_only ], ... ]
	private $_promo_list = array(
		'new_version'	=> array( 7, false ),
		'score'			=> array( 14, false ),
		// 'slack'		=> array( 3, false ),
	);

	const LIB_GUEST_JS = 'assets/js/guest.min.js';
	const LIB_GUEST_DOCREF_JS = 'assets/js/guest.docref.min.js';
	const PHP_GUEST = 'guest.vary.php';

	const TYPE_DISMISS_WHM = 'whm';
	const TYPE_DISMISS_EXPIRESDEFAULT = 'ExpiresDefault';
	const TYPE_DISMISS_PROMO = 'promo';
	const TYPE_DISMISS_PIN = 'pin';

	const WHM_MSG = 'lscwp_whm_install';
	const WHM_MSG_VAL = 'whm_install';

	protected $_summary;

	/**
	 * Instance
	 *
	 * @since  1.3
	 */
	public function __construct() {
		$this->_summary = self::get_summary();

	}

	/**
	 * Frontend Init
	 *
	 * @since  3.0
	 */
	public function init() {
		Debug2::debug2( '[GUI] init' );
		if ( is_admin_bar_showing() && current_user_can( 'manage_options' ) ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_style' ) );
			add_action( 'admin_bar_menu', array( $this, 'frontend_shortcut' ), 95 );
		}

		/**
		 * Turn on instant click
		 * @since  1.8.2
		 */
		if ( $this->conf( self::O_UTIL_INSTANT_CLICK ) ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_style_public' ) );
		}

		// NOTE: this needs to be before optimizer to avoid wrapper being removed
		add_filter( 'litespeed_buffer_finalize', array( $this, 'finalize' ), 8 );
	}

	/**
	* Print a loading message when redirecting CCSS/UCSS page to aviod whiteboard confusion
	*/
	public static function print_loading( $counter, $type ) {
		echo '<div style="font-size: 25px; text-align: center; padding-top: 150px; width: 100%; position: absolute;">';
		echo "<img width='35' src='" . LSWCP_PLUGIN_URL . "assets/img/Litespeed.icon.svg' />   ";
		echo sprintf( __( '%1$s %2$s files left in queue', 'litespeed-cache' ), $counter, $type );
		echo '<p><a href="' . admin_url( 'admin.php?page=litespeed-page_optm' ) . '">' . __( 'Cancel', 'litespeed-cache' ) . '</a></p>';
		echo '</div>';
	}

	/**
	 * Display a pie
	 *
	 * @since 1.6.6
	 */
	public static function pie( $percent, $width = 50, $finished_tick = false, $without_percentage = false, $append_cls = false ) {
		$percentage = '<text x="50%" y="50%">' . $percent . ( $without_percentage ? '' : '%' ) . '</text>';

		if ( $percent == 100 && $finished_tick ) {
			$percentage = '<text x="50%" y="50%" class="litespeed-pie-done">&#x2713</text>';
		}

		return "
		<svg class='litespeed-pie $append_cls' viewbox='0 0 33.83098862 33.83098862' width='$width' height='$width' xmlns='http://www.w3.org/2000/svg'>
			<circle class='litespeed-pie_bg' cx='16.91549431' cy='16.91549431' r='15.91549431' />
			<circle class='litespeed-pie_circle' cx='16.91549431' cy='16.91549431' r='15.91549431' stroke-dasharray='$percent,100' />
			<g class='litespeed-pie_info'>$percentage</g>
		</svg>
		";
	}

	/**
	 * Display a tiny pie with a tooltip
	 *
	 * @since 3.0
	 */
	public static function pie_tiny( $percent, $width = 50, $tooltip = '', $tooltip_pos = 'up', $append_cls = false ) {

		// formula C = 2πR
		$dasharray = 2 * 3.1416 * 9 * ( $percent / 100 );

		return "
		<button type='button' data-balloon-break data-balloon-pos='$tooltip_pos' aria-label='$tooltip' class='litespeed-btn-pie'>
		<svg class='litespeed-pie litespeed-pie-tiny $append_cls' viewbox='0 0 30 30' width='$width' height='$width' xmlns='http://www.w3.org/2000/svg'>
			<circle class='litespeed-pie_bg' cx='15' cy='15' r='9' />
			<circle class='litespeed-pie_circle' cx='15' cy='15' r='9' stroke-dasharray='$dasharray,100' />
			<g class='litespeed-pie_info'><text x='50%' y='50%'>i</text></g>
		</svg>
		</button>
		";
	}

	/**
	 * Get classname of PageSpeed Score
	 *
	 * Scale:
	 * 	90-100 (fast)
	 * 	50-89 (average)
	 * 	0-49 (slow)
	 *
	 * @since  2.9
	 * @access public
	 */
	public function get_cls_of_pagescore( $score ) {
		if ( $score >= 90 ) {
			return 'success';
		}

		if ( $score >= 50 ) {
			return 'warning';
		}

		return 'danger';
	}

	/**
	 * Dismiss banner
	 *
	 * @since 1.0
	 * @access public
	 */
	public static function dismiss() {
		$_instance = self::cls();
		switch ( Router::verify_type() ) {
			case self::TYPE_DISMISS_WHM :
				self::dismiss_whm();
				break;

			case self::TYPE_DISMISS_EXPIRESDEFAULT :
				self::update_option( Admin_Display::DB_DISMISS_MSG, Admin_Display::RULECONFLICT_DISMISSED );
				break;

			case self::TYPE_DISMISS_PIN:
				admin_display::dismiss_pin();
				break;

			case self::TYPE_DISMISS_PROMO:
				if ( empty( $_GET[ 'promo_tag' ] ) ) {
					break;
				}

				$promo_tag = sanitize_key( $_GET[ 'promo_tag' ] );

				if ( empty( $_instance->_promo_list[ $promo_tag ] ) ) {
					break;
				}

				defined( 'LSCWP_LOG' ) && Debug2::debug( '[GUI] Dismiss promo ' . $promo_tag );

				// Forever dismiss
				if ( ! empty( $_GET[ 'done' ] ) ) {
					$_instance->_summary[ $promo_tag ] = 'done';
				}
				elseif ( ! empty( $_GET[ 'later' ] ) ) {
					// Delay the banner to half year later
					$_instance->_summary[ $promo_tag ] = time() + 86400 * 180;
				}
				else {
					// Update welcome banner to 30 days after
					$_instance->_summary[ $promo_tag ] = time() + 86400 * 30;
				}

				self::save_summary();

				break;

			default:
				break;
		}

		if ( Router::is_ajax() ) {
			// All dismiss actions are considered as ajax call, so just exit
			exit( json_encode( array( 'success' => 1 ) ) );
		}

		// Plain click link, redirect to referral url
		Admin::redirect();
	}

	/**
	 * Check if has rule conflict notice
	 *
	 * @since 1.1.5
	 * @access public
	 * @return boolean
	 */
	public static function has_msg_ruleconflict() {
		$db_dismiss_msg = self::get_option( Admin_Display::DB_DISMISS_MSG );
		if ( ! $db_dismiss_msg ) {
			self::update_option( Admin_Display::DB_DISMISS_MSG, -1 );
		}
		return $db_dismiss_msg == Admin_Display::RULECONFLICT_ON;
	}

	/**
	 * Check if has whm notice
	 *
	 * @since 1.1.1
	 * @access public
	 * @return boolean
	 */
	public static function has_whm_msg() {
		$val = self::get_option( self::WHM_MSG );
		if ( ! $val ) {
			self::dismiss_whm();
			return false;
		}
		return $val == self::WHM_MSG_VAL;
	}

	/**
	 * Delete whm msg tag
	 *
	 * @since 1.1.1
	 * @access public
	 */
	public static function dismiss_whm() {
		self::update_option( self::WHM_MSG, -1 );
	}

	/**
	 * Set current page a litespeed page
	 *
	 * @since  2.9
	 */
	private function _is_litespeed_page() {
		if ( ! empty( $_GET[ 'page' ] ) && in_array( $_GET[ 'page' ],
			array(
				'litespeed-settings',
				'litespeed-dash',
				Admin::PAGE_EDIT_HTACCESS,
				'litespeed-optimization',
				'litespeed-crawler',
				'litespeed-import',
				'litespeed-report',
			) )
		) {
			return true;
		}

		return false;
	}

	/**
	 * Display promo banner
	 *
	 * @since 2.1
	 * @access public
	 */
	public function show_promo( $check_only = false ) {
		$is_litespeed_page = $this->_is_litespeed_page();

		// Bypass showing info banner if disabled all in debug
		if ( defined( 'LITESPEED_DISABLE_ALL' ) ) {
			if ( $is_litespeed_page && ! $check_only ) {
				include_once LSCWP_DIR . "tpl/inc/disabled_all.php";
			}

			return false;
		}

		if ( file_exists( ABSPATH . '.litespeed_no_banner' ) ) {
			defined( 'LSCWP_LOG' ) && Debug2::debug( '[GUI] Bypass banners due to silence file' );
			return false;
		}

		foreach ( $this->_promo_list as $promo_tag => $v ) {
			list( $delay_days, $litespeed_page_only ) = $v;

			if ( $litespeed_page_only && ! $is_litespeed_page ) {
				continue;
			}

			// first time check
			if ( empty( $this->_summary[ $promo_tag ] ) ) {
				$this->_summary[ $promo_tag ] = time() + 86400 * $delay_days;
				self::save_summary();

				continue;
			}

			$promo_timestamp = $this->_summary[ $promo_tag ];

			// was ticked as done
			if ( $promo_timestamp == 'done' ) {
				continue;
			}

			// Not reach the dateline yet
			if ( time() < $promo_timestamp ) {
				continue;
			}

			// try to load, if can pass, will set $this->_promo_true = true
			$this->_promo_true = false;
			include LSCWP_DIR . "tpl/banner/$promo_tag.php";

			// If not defined, means it didn't pass the display workflow in tpl.
			if ( ! $this->_promo_true ) {
				continue;
			}

			if ( $check_only ) {
				return $promo_tag;
			}

			defined( 'LSCWP_LOG' ) && Debug2::debug( '[GUI] Show promo ' . $promo_tag );

			// Only contain one
			break;

		}

		return false;
	}

	/**
	 * Load frontend public script
	 *
	 * @since  1.8.2
	 * @access public
	 */
	public function frontend_enqueue_style_public() {
		wp_enqueue_script( Core::PLUGIN_NAME, LSWCP_PLUGIN_URL . 'assets/js/instant_click.min.js', array(), Core::VER, true );
	}

	/**
	 * Load frontend menu shortcut
	 *
	 * @since  1.3
	 * @access public
	 */
	public function frontend_enqueue_style() {
		wp_enqueue_style( Core::PLUGIN_NAME, LSWCP_PLUGIN_URL . 'assets/css/litespeed.css', array(), Core::VER, 'all' );
	}

	/**
	 * Load frontend menu shortcut
	 *
	 * @since  1.3
	 * @access public
	 */
	public function frontend_shortcut() {
		global $wp_admin_bar;

		$wp_admin_bar->add_menu( array(
			'id'	=> 'litespeed-menu',
			'title'	=> '<span class="ab-icon"></span>',
			'href'	=> get_admin_url( null, 'admin.php?page=litespeed' ),
			'meta'	=> array( 'tabindex' => 0, 'class' => 'litespeed-top-toolbar' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent'	=> 'litespeed-menu',
			'id'		=> 'litespeed-purge-single',
			'title'		=> __( 'Purge this page', 'litespeed-cache' ) . ' - LSCache',
			'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_FRONT, false, true ),
			'meta'		=> array( 'tabindex' => '0' ),
		) );

		if ( $this->has_cache_folder( 'ucss' ) ) {
			$possible_url_tag = UCSS::get_url_tag();
			$append_arr = array();
			if ( $possible_url_tag ) {
				$append_arr[ 'url_tag' ] = $possible_url_tag;
			}

			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-single-ucss',
				'title'		=> __( 'Purge this page', 'litespeed-cache' ) . ' - UCSS',
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_UCSS, false, true, $append_arr ),
				'meta'		=> array( 'tabindex' => '0' ),
			) );
		}

		$wp_admin_bar->add_menu( array(
			'parent'	=> 'litespeed-menu',
			'id'		=> 'litespeed-single-action',
			'title'		=> __( 'Mark this page as ', 'litespeed-cache' ),
			'meta'		=> array( 'tabindex' => '0' ),
		) );

		if ( ! empty( $_SERVER[ 'REQUEST_URI' ] ) ) {
			$append_arr = array(
				Conf::TYPE_SET . '[' . self::O_CACHE_FORCE_URI . '][]' => $_SERVER[ 'REQUEST_URI' ] . '$',
				'redirect'	=> $_SERVER[ 'REQUEST_URI' ],
			);
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-single-action',
				'id'		=> 'litespeed-single-forced_cache',
				'title'		=> __( 'Forced cacheable', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_CONF, Conf::TYPE_SET, false, true, $append_arr ),
			) );

			$append_arr = array(
				Conf::TYPE_SET . '[' . self::O_CACHE_EXC . '][]' => $_SERVER[ 'REQUEST_URI' ] . '$',
				'redirect'	=> $_SERVER[ 'REQUEST_URI' ],
			);
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-single-action',
				'id'		=> 'litespeed-single-noncache',
				'title'		=> __( 'Non cacheable', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_CONF, Conf::TYPE_SET, false, true, $append_arr ),
			) );

			$append_arr = array(
				Conf::TYPE_SET . '[' . self::O_CACHE_PRIV_URI . '][]' => $_SERVER[ 'REQUEST_URI' ] . '$',
				'redirect'	=> $_SERVER[ 'REQUEST_URI' ],
			);
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-single-action',
				'id'		=> 'litespeed-single-private',
				'title'		=> __( 'Private cache', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_CONF, Conf::TYPE_SET, false, true, $append_arr ),
			) );

			$append_arr = array(
				Conf::TYPE_SET . '[' . self::O_OPTM_EXC . '][]' => $_SERVER[ 'REQUEST_URI' ] . '$',
				'redirect'	=> $_SERVER[ 'REQUEST_URI' ],
			);
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-single-action',
				'id'		=> 'litespeed-single-nonoptimize',
				'title'		=> __( 'No optimization', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_CONF, Conf::TYPE_SET, false, true, $append_arr ),
			) );
		}

		$wp_admin_bar->add_menu( array(
			'parent'	=> 'litespeed-single-action',
			'id'		=> 'litespeed-single-more',
			'title'		=> __( 'More settings', 'litespeed-cache' ),
			'href'		=> get_admin_url( null, 'admin.php?page=litespeed-cache' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent'	=> 'litespeed-menu',
			'id'		=> 'litespeed-purge-all',
			'title'		=> __( 'Purge All', 'litespeed-cache' ),
			'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL, false, '_ori' ),
			'meta'		=> array( 'tabindex' => '0' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent'	=> 'litespeed-menu',
			'id'		=> 'litespeed-purge-all-lscache',
			'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - ' . __( 'LSCache', 'litespeed-cache' ),
			'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_LSCACHE, false, '_ori' ),
			'meta'		=> array( 'tabindex' => '0' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent'	=> 'litespeed-menu',
			'id'		=> 'litespeed-purge-cssjs',
			'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - ' . __( 'CSS/JS Cache', 'litespeed-cache' ),
			'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_CSSJS, false, '_ori' ),
			'meta'		=> array( 'tabindex' => '0' ),
		) );

		if ( defined( 'LSCWP_OBJECT_CACHE' ) ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-object',
				'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - ' . __( 'Object Cache', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_OBJECT, false, '_ori' ),
				'meta'		=> array( 'tabindex' => '0' ),
			) );
		}

		if ( Router::opcache_enabled() ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-opcache',
				'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - ' . __( 'Opcode Cache', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_OPCACHE, false, '_ori' ),
				'meta'		=> array( 'tabindex' => '0' ),
			) );
		}

		if ( $this->has_cache_folder( 'ccss' ) ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-ccss',
				'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - CCSS',
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_CCSS, false, '_ori' ),
				'meta'		=> array( 'tabindex' => '0' ),
			) );
		}

		if ( $this->has_cache_folder( 'ucss' ) ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-ucss',
				'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - UCSS',
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_UCSS, false, '_ori' ),
			) );
		}

		if ( $this->has_cache_folder( 'localres' ) ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-localres',
				'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - ' . __( 'Localized Resources', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_LOCALRES, false, '_ori' ),
				'meta'		=> array( 'tabindex' => '0' ),
			) );
		}

		if ( $this->has_cache_folder( 'lqip' ) ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-placeholder',
				'title'		=> __( 'Purge All', 'litespeed-cache' ) . ' - ' . __( 'LQIP Cache', 'litespeed-cache' ),
				'href'		=> Utility::build_url( Router::ACTION_PURGE, Purge::TYPE_PURGE_ALL_LQIP, false, '_ori' ),
				'meta'		=> array( 'tabindex' => '0' ),
			) );
		}

		if ( $this->has_cache_folder( 'avatar' ) ) {
			$wp_admin_bar->add_menu( array(
				'parent'	=> 'litespeed-menu',
				'id'		=> 'litespeed-purge-avata