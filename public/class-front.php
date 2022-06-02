<?php

namespace SkeletonBlockTheme;
/**
 * The public-facing functionality of the theme.
 *
 * @link       https://bjmdigital.com.au/
 * @author     BJM Team <developers@bjmdigital.com.au>
 * @since      0.0.1
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/public
 */

class Front {

	/**
	 * @var string $public_style_handle the public style handle id
	 */
	private $public_style_handle;

	/**
	 * @var string $public_script_handle the public style handle id
	 */
	private $public_script_handle;

	public function __construct( ) {

		$this->public_style_handle  = SKELETON_BLOCK_THEME_IDENTIFIER . '-public-style';
		$this->public_script_handle  = SKELETON_BLOCK_THEME_IDENTIFIER . '-public-script';

		$this->register_hooks();
	}

	/**
	 * Register required hooks
	 */
	public function register_hooks() {

		/**
		 * Enqueue Styles
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		/**
		 * Enqueue Scripts
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );


	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		$style_css = 'public.css';

		wp_enqueue_style(
			$this->public_style_handle,
			bjm_get_build_url( $style_css ),
			array(),
			filemtime( bjm_get_build_dir( $style_css ) )
		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		$script_asset_path = bjm_get_build_dir( 'public.asset.php' );

		if ( ! file_exists( $script_asset_path ) ) {
			throw new \Error(
				'You need to first run `npm start` or `npm run build` for the blocks offered by this them. Could Not find the index.asset.php file'
			);
		}

		/**
		 * Register Scripts
		 */
		$script_asset = require( $script_asset_path );
		wp_enqueue_script(
			$this->public_script_handle,
			bjm_get_build_url( 'public.js' ),
			$script_asset['dependencies'],
			$script_asset['version']
		);

		/**
		 * Localize Scripts
		 * Passes translations to JavaScript.
		 */
		if ( function_exists( 'wp_set_script_translations' ) ) {
			/**
			 * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
			 * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
			 * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
			 */
			wp_set_script_translations( $this->public_script_handle, 'theme-text-domain' );
		}

		wp_localize_script(
			$this->public_script_handle,
			'SkeletonBlockTheme_Public',
			$this->get_localize_script_data()
		);

	}

	/**
	 * Localize Public facing scripts
	 */
	public function get_localize_script_data() {

		$localize_data = [
			'site_url' => get_site_url(),
			'nonce'    => wp_create_nonce( 'wp_rest' ),
		];


		return apply_filters( SKELETON_BLOCK_THEME_PREFIX . 'public_script_localize_data', $localize_data );

	}


}
