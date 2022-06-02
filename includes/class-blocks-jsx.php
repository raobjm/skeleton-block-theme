<?php

namespace SkeletonBlockTheme;
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if class already defined, bail out
if ( class_exists( 'SkeletonBlockTheme\Blocks_Jsx' ) ) {
	return;
}


/**
 * This class will set up the JSX Blocks and enqueue required assets
 *
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 */
class Blocks_Jsx {

	/**
	 * @var string $editor_script_handle the editor script handle id
	 */
	private $editor_script_handle;

	/**
	 * @var string $editor_style_handle the editor style handle id
	 */
	private $editor_style_handle;

	/**
	 * @var string $public_style_handle the public style handle id
	 */
	private $public_style_handle;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->editor_script_handle = SKELETON_BLOCK_THEME_IDENTIFIER . '-block-editor-script';
		$this->editor_style_handle  = SKELETON_BLOCK_THEME_IDENTIFIER . '-block-editor-style';
		$this->public_style_handle  = SKELETON_BLOCK_THEME_IDENTIFIER . '-block-style';

		$this->register_hooks();

	}

	/**
	 * Register required hooks
	 */
	public function register_hooks() {

		/**
		 * Only for Editor (admin)
		 */
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets' ] );

		/**
		 * For Editor (admin) and Public (frontend)
		 */
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_assets' ] );

	}

	/**
	 * Enqueue assets for Editor (admin) and Public (frontend) side
	 * @hooked  enqueue_block_assets
	 */
	public function enqueue_block_assets() {

		$style_css = 'style-index.css';
		wp_enqueue_style(
			$this->public_style_handle,
			bjm_get_build_url( $style_css ),
			array(),
			filemtime( bjm_get_build_dir( $style_css ) )
		);

	}

	/**
	 * Enqueue CSS and JS assets for Editor
	 * @hooked  enqueue_block_editor_assets
	 */
	public function enqueue_block_editor_assets() {

		$script_asset_path = bjm_get_build_dir( 'index.asset.php' );

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
			$this->editor_script_handle,
			bjm_get_build_url( 'index.js' ),
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
			wp_set_script_translations( $this->editor_script_handle, 'skeleton-block-theme' );
		}

		wp_localize_script( $this->editor_script_handle, 'SkeletonBlockTheme', $this->get_localize_script_data() );

		/**
		 * Register CSS Style
		 */

		$editor_css = 'index.css';
		wp_enqueue_style(
			$this->editor_style_handle,
			bjm_get_build_url( $editor_css ),
			array(),
			filemtime( bjm_get_build_dir( $editor_css ) )
		);

	}

	/**
	 *
	 */
	public function get_localize_script_data() {

		$localize_data = [
			'site_url' => get_site_url(),
			'nonce'    => wp_create_nonce( 'wp_rest' ),
		];


		return apply_filters( SKELETON_BLOCK_THEME_PREFIX . 'editor_script_localize_data', $localize_data );

	}

}