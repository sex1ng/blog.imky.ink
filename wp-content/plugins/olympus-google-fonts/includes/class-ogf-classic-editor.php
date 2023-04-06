<?php
/**
 * Add Google Fonts dropdown to the classic editor.
 *
 * @package   olympus-google-fonts
 * @copyright Copyright (c) 2020, Fonts Plugin
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! class_exists( 'OGF_Classic_Editor' ) ) :
	/**
	 * The 'Classic Editor' class.
	 */
	class OGF_Classic_Editor {

		/**
		 * OGF_Fonts object.
		 *
		 * @var object
		 */
		private $ogf_fonts;

		/**
		 * Array of system fonts.
		 *
		 * @var array
		 */
		private $system_fonts;

		/**
		 * Array of custom fonts.
		 *
		 * @var array
		 */
		private $custom_fonts;

		/**
		 * Array of typekit fonts.
		 *
		 * @var array
		 */
		private $typekit_fonts;

		/**
		 * Class constructor.
		 */
		public function __construct() {
			if ( true === get_theme_mod( 'ogf_disable_post_level_controls', false ) ) {
				return;
			}

			$this->ogf_fonts     = new OGF_Fonts();
			$this->system_fonts  = ogf_system_fonts();
			$this->custom_fonts  = ogf_custom_fonts();
			$this->typekit_fonts = ogf_typekit_fonts();

			add_filter( 'mce_buttons', array( $this, 'tinymce_add_buttons' ), 1 );
			add_filter( 'tiny_mce_before_init', array( $this, 'tinymce_custom_options' ) );
			add_filter( 'ogf_classic_font_formats', array( $this, 'tinymce_add_fonts' ) );
			add_action( 'admin_init', array( $this, 'google_fonts_enqueue' ) );
			add_action( 'admin_init', array( $this, 'typekit_fonts_enqueue' ) );
		}

		/**
		 * Add buttons to the editor.
		 *
		 * @param array $buttons Tiny MCE buttons array.
		 * @return array Modified Tiny MCE buttons array.
		 */
		public function tinymce_add_buttons( $buttons ) {
			return array_merge(
				array( 'fontselect', 'fontsizeselect' ),
				$buttons
			);
		}

		/**
		 * Customize the Tiny MCE settings.
		 *
		 * @param array $opt Tiny MCE options.
		 * @return array Modified Tiny MCE options.
		 */
		public function tinymce_custom_options( $opt ) {
			$base_type     = get_theme_mod( 'ogf_body_font' );
			$headings_type = get_theme_mod( 'ogf_headings_font' );

			if ( ogf_is_custom_font( $base_type ) && array_key_exists( $base_type, $this->custom_fonts ) ) {
				$base_type = str_replace( 'cf-', '', $base_type );
			} elseif ( ogf_is_system_font( $base_type ) && array_key_exists( $base_type, $this->system_fonts ) ) {
				$base_type = str_replace( 'sf-', '', $base_type );
				$base_type = $this->system_fonts[ $base_type ]['stack'];
			} elseif ( ogf_is_google_font( $base_type ) ) {
				$base_type = $this->ogf_fonts->get_font_name( $base_type );
			} elseif ( ogf_is_typekit_font( $base_type ) && array_key_exists( $base_type, $this->typekit_fonts ) ) {
				$base_type = $this->typekit_fonts[ $base_type ]['stack'];
			}

			if ( ogf_is_custom_font( $headings_type ) ) {
				$headings_type = str_replace( 'cf-', '', $headings_type );
			} elseif ( ogf_is_system_font( $headings_type ) && array_key_exists( $headings_type, $this->system_fonts ) ) {
				$headings_type = str_replace( 'sf-', '', $headings_type );
				$headings_type = $this->system_fonts[ $headings_type ]['stack'];
			} elseif ( ogf_is_google_font( $headings_type ) ) {
				$headings_type = $this->ogf_fonts->get_font_name( $headings_type );
			} elseif ( ogf_is_typekit_font( $headings_type ) && array_key_exists( $headings_type, $this->typekit_fonts ) ) {
				$headings_type = $this->typekit_fonts[ $headings_type ]['label'];
			}

			$opt['font_formats'] = apply_filters( 'ogf_classic_font_formats', 'Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;' );

			if ( ! isset( $opt['content_style'] ) ) {
				$opt['content_style'] = '';
			}

			if ( $base_type !== 'default' ) {
				$opt['content_style'] .= 'body#tinymce, body#tinymce p { font-family: ' . str_replace( '"', '\'', $base_type ) . ' !important; }';
			}
			if ( $headings_type !== 'default' ) {
				$opt['content_style'] .= '#tinymce h1, #tinymce h2, #tinymce h3, #tinymce h4, #tinymce h5, #tinymce h6 { font-family: ' . str_replace( '"', '\'', $headings_type ) . ' !important; }';
			}

			$opt['content_style'] .= ogf_return_custom_font_css();
			return $opt;
		}

		/**
		 * Add fonts to the classic editor list.
		 *
		 * @param string $old_default The default fonts.
		 * @return string Modified fonts string.
		 */
		public function tinymce_add_fonts( $old_default ) {
			$new_default = '';
			$choices     = $this->ogf_fonts->choices;
			foreach ( array_unique( $choices ) as $font ) {
				if ( ogf_is_google_font( $font ) ) {
					$new_default .= $this->ogf_fonts->get_font_name( $font ) . '=' . $this->ogf_fonts->get_font_name( $font ) . ';';
				}
			}

			foreach ( $this->custom_fonts as $font ) {
				$new_default .= $font['label'] . '=' . $font['stack'] . ';';
			}

			foreach ( $this->typekit_fonts as $font ) {
				$new_default .= $font['label'] . '=' . str_replace( '"', '', $font['stack'] ) . ';';
			}

			$new_default .= $old_default;
			return $new_default;
		}

		/**
		 * Enqueue the Google Fonts in TinyMCE.
		 */
		public function google_fonts_enqueue() {
			global $editor_styles;
			if ( $this->ogf_fonts->has_google_fonts() ) {
				$editor_styles[] = $this->ogf_fonts->build_url();
			}
		}

		/**
		 * Enqueue the Typekit Fonts in TinyMCE.
		 */
		public function typekit_fonts_enqueue() {
			global $editor_styles;

			$typekit_data = get_option( 'fp-typekit-data', array() );

			if ( is_array( $typekit_data ) ) {
				foreach ( $typekit_data as $id => $values ) {
					// skip if the kit is disabled.
					if ( $values['enabled'] === false ) {
						continue;
					}

					$editor_styles[] = esc_url( 'https://use.typekit.com/' . $id . '.css' );
				}
			}
		}

	}
endif;

/*
 * Instantiate the OGF_Classic_Editor class.
 */
new OGF_Classic_Editor();
