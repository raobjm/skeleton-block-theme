<?php

namespace SkeletonBlockTheme;

/**
 * The file that defines the core theme class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://bjmdigital.com.au/
 * @since      0.0.1
 *
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 */

/**
 * The core theme class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this theme as well as the current
 * version of the theme.
 *
 * @since      0.0.1
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 * @author     BJM <developers@bjmdigital.com.au>
 */
class Init {

	/**
	 * The instance of this class
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      object $instance The instance of the current class
	 */
	protected static $instance;


	/**
	 * Define the core functionality of the theme.
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->after_setup_theme();
		$this->define_acf_hooks();
		$this->define_api_hooks();
		$this->define_public_hooks();
		$this->define_blocks_jsx_hooks();

		do_action( 'skeleton_block_theme_init_construct' );

	}

	/**
	 * Register hooks related to the after_setup_theme
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function after_setup_theme() {

		new After_Setup_Theme();

	}

	/**
	 * Register hooks related to the ACF Support
	 * of the theme.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_acf_hooks() {

		new Acf();

	}

	/**
	 * Register hooks related to the API functionality
	 * of the theme.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_api_hooks() {

		$this->api = new Api();

	}

	/**
	 * Register hooks related to the public-facing functionality
	 * of the theme.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_public_hooks() {

		new Front();

	}

	/**
	 * Register all the hooks related to Gutenberg
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_blocks_jsx_hooks() {

		if ( ! function_exists( 'register_block_type' ) ) {
			// Gutenberg is not active.
			return;
		}

		$this->blocks = new Blocks_Jsx();

	}

	/**
	 * get the instance of the main theme class
	 */
	public static function get_instance() {

		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

}
