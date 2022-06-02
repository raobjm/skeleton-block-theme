<?php

namespace SkeletonBlockTheme;
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if class already defined, bail out
if ( class_exists( 'SkeletonBlockTheme\Acf' ) ) {
	return;
}


/**
 * This class will set up the Acf options and Acf Blocks
 *
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 */
class Acf {


	/**
	 * @var array a list of removed blocks
	 */
	private $removed_blocks = [];

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->register_acf_options();
		$this->register_hooks();

	}

	/**
	 * Register ACF Options
	 */
	public function register_acf_options() {


		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return null;
		}

		acf_add_options_page(
			[
				'page_title' => esc_html__( 'Theme Options', 'theme-text-domain' ),
				'menu_title' => esc_html__( 'Theme Options', 'theme-text-domain' ),
				'menu_slug'  => 'theme-options', // after changing the slug, update Fields Group location as well
				'capability' => 'manage_options',
				'icon_url'   => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MzYiIGhlaWdodD0iNjM2IiB2aWV3Qm94PSIwIDAgMzYzLjA0IDM2My4wNCINCiAgc2hhcGUtcmVuZGVyaW5nPSJnZW9tZXRyaWNQcmVjaXNpb24iIGltYWdlLXJlbmRlcmluZz0ib3B0aW1pemVRdWFsaXR5IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNmZWZlZmUiDQogIHhtbG5zOnY9Imh0dHBzOi8vdmVjdGEuaW8vbmFubyI+DQogIDxwYXRoIGQ9Ik0wIDBoMzYzLjA0djM2My4wNEgweiIgZmlsbC1vcGFjaXR5PSIwIiAvPg0KICA8cGF0aA0KICAgIGQ9Ik03MS43IDkzLjYzbDY5LjAyLTM4LjUyTDcxLjcgMTYuMjJ6bTcwLjU0LTM1LjA5TDczLjYxIDk3LjA2bDY4LjYzIDM4Ljg5em0tMjkuNzQgNjQuODNsLTQwLjgtMjIuODh2NzcuNzlsMzkuMjctMjIuMTIgMjkuNzUtMTYuNzh6bTMwLjEyIDE5LjQ1bC02OC42MyAzOC44OSAxMS40NCA2LjQ4IDU3LjE5IDMyLjAzem0tMi4yOCA4MC44M2wtNjIuMTYtMzUuMDgtNi40OC0zLjQzdjc3LjQxem0yLjI4IDMuNDRsLTY4LjYzIDM4Ljg5IDY4LjYzIDM4LjUxem0tMi4yOCA4MC44NEw3MS43IDI2OS40MXY3Ny40MXptNzcuMDItMzguNTJsLTY4LjYzIDM4LjUyIDY4LjYzIDM4Ljg5em0zLjgyIDB2NzcuNDFsNjguMjUtMzguODl6bTEuOS0zLjQzbDY4LjI2IDM4LjUxdi03Ny40em0wLTg0LjI3bDY4LjI2IDM4LjN2LTc3LjE5em0tMS45LTMuNDNsNjguMjUtMzguOS02OC4yNS0zOC44OXptLTMuODIgMHYtNzcuNzlsLTY4LjYzIDM4Ljg5eiIgLz4NCjwvc3ZnPg=='
			]
		);

	}

	/**
	 * Register required hooks
	 */
	public function register_hooks() {

		/**
		 * Register ACF Blocks
		 */
		add_action( 'acf/init', [ $this, 'register_blocks_with_acf' ] );

	}

	/**
	 * Register ACF Blocks
	 *
	 * @hooked acf/init
	 */
	public function register_blocks_with_acf() {

		/**
		 * If we do not have ACF activated, bail out early
		 */
		if ( ! function_exists( 'acf_register_block' ) ) {
			return null;
		}

		$remove_blocks = $this->get_removed_blocks();

		$blocks_to_register = $this->get_acf_blocks_config();

		if ( ! is_array( $blocks_to_register ) || empty( $blocks_to_register ) ) {
			return null;
		}

		foreach ( $blocks_to_register as $block ):

			$block_name = $block['name'] ?? null;

			/**
			 * If this block name is in $remove_blocks, continue
			 */
			if ( ! $block_name || in_array( "acf/$block_name", $remove_blocks, true ) ) {
				continue;
			}

			/**
			 * Set a render template if not defined
			 */
			if ( ! isset( $block['render_template'] ) ) {
				$block['render_template'] = get_template_directory() . "/blocks/{$block_name}.php" ;
			}

			acf_register_block_type( $block );


		endforeach;


	}

	/**
	 * Get removed blocks
	 */
	public function get_removed_blocks() {

		return apply_filters( SKELETON_BLOCK_THEME_PREFIX . 'remove_block_types', $this->removed_blocks );

	}

	/**
	 * Get ACF blocks config array
	 */
	public function get_acf_blocks_config() {

		$blocks = [];

		$blocks[] = [
			'name'        => 'test-block',
			'title'       => __( 'BJM Test Block with ACF' ),
			'description' => __( 'BJM Test Block created with ACF' ),
			'category'    => 'theme',
			'icon'        => 'block-default',
			'keywords'    => [ 'test-block', 'bjm', 'acf', 'example' ],
		];

//		$blocks[] = [
//			'name'        => 'cards',
//			'title'       => __( 'Blokki Cards' ),
//			'description' => __( 'Add block of cards for a post type.' ),
//			'category'    => 'theme',
//			'icon'        => 'forms',
//			'keywords'    => [ Skeleton Block Theme, 'cards', 'cpt', 'grid' ],
//		];
//
//		$blocks[] = [
//			'name'        => 'accordions',
//			'title'       => __( 'Blokki Accordions' ),
//			'description' => __( 'Add block of accordions for a post type.' ),
//			'category'    => 'theme',
//			'icon'        => 'excerpt-view',
//			'keywords'    => [ Skeleton Block Theme, 'accordions', 'cpt', 'grid', 'cards', 'post type' ],
//		];
//
//		$blocks[] = [
//			'name'        => 'grid-with-filters',
//			'title'       => __( 'Blokki Grid with filters' ),
//			'description' => __( 'Add WPGB Grid with facets.' ),
//			'category'    => 'theme',
//			'icon'        => 'schedule',
//			'keywords'    => [ Skeleton Block Theme, 'wp grid builder', 'grid', 'cards', 'filter', 'facet' ],
//			'mode'        => 'edit',
//		];
//
//		$blocks['social-share'] = [
//			'name'        => 'social-share',
//			'title'       => __( 'Blokki Social Share', 'theme-text-domain' ),
//			'description' => __( 'Add social sharing buttons.', 'theme-text-domain' ),
//			'category'    => 'theme',
//			'icon'        => 'share',
//			'keywords'    => [ Skeleton Block Theme, 'social-share' ],
//		];

		return apply_filters( SKELETON_BLOCK_THEME_PREFIX . 'acf_blocks_config', $blocks );

	}


}