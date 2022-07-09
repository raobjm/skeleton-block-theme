<?php

namespace SkeletonBlockTheme;
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if class already defined, bail out
if ( class_exists( 'SkeletonBlockTheme\Plugins_Manager' ) ) {
	return;
}


/**
 * This class will require the dependency plugins
 * Register the required plugins for this theme.
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 *
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 */
class Plugins_Manager {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->register_hooks();

	}

	/**
	 * Register required hooks
	 */
	public function register_hooks() {

		add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );
	}

	/**
	 * The variables passed to the `tgmpa()` function should be:
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 * If you are not changing anything in the configuration array, you can remove the array and remove the
	 * variable from the function call: `tgmpa( $plugins );`.
	 * In that case, the TGMPA default settings will be used.
	 *
	 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
	 *
	 * @hooked tgmpa_register
	 */
	public function register_required_plugins() {

		/**
		 * Initialize tgmpa for theme
		 */
		tgmpa( $this->get_plugins(), $this->get_config() );

	}

	/**
	 *
	 */
	public function get_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 * Details for config can be found here: http://tgmpluginactivation.com/configuration/
		 */
		$plugins = array(
			// The ACF plugin is required and should be auto activated on theme activate
			array(
				'name'             => 'Advanced Custom Fields PRO',
				'slug'             => 'advanced-custom-fields-pro',
				'source'           => 'advanced-custom-fields-pro.zip',
				'force_activation' => true,
				'version'          => '5.12.2',
				'required'         => true,
			),


			array(
				'name'               => esc_html__( 'Blokki', 'theme-text-domain' ),
				'slug'               => 'blokki',
				'source'             => 'blokki.zip',
				'required'           => true,
				'version'            => '1.0.0',
				// minimum required
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL.
				'is_callable'        => '',
				// If set, this callable will be checked for availability to determine if a plugin is active.
			),

			array(
				'name'     => 'ACF: Font Awesome Field',
				'slug'     => 'advanced-custom-fields-font-awesome',
				'version'  => '4.0.3',
				'required' => true,
			),

			/**
			 * Bundled Plugins
			 */
			array(
				'name'    => 'Admin Columns Pro',
				'slug'    => 'admin-columns-pro',
				'source'  => 'admin-columns-pro.zip',
				'version' => '5.7.1',
			),

			/**
			 * Admin Columns  Pro: Acf Addon
			 */
			array(
				'name'    => 'Admin Columns Pro ACF Addon',
				'slug'    => 'ac-addon-acf',
				'source'  => 'ac-addon-acf.zip',
				'version' => '3.0.2',
			),

			/**
			 * Plugins from https://wordpress.org repo
			 */
			array(
				'name'     => 'SVG Support',
				'slug'     => 'svg-support',
				'version'  => '2.4.2',
				'required' => true,
			),

			array(
				'name'    => 'Post Types Order',
				'slug'    => 'post-types-order',
				'version' => '1.9.9',
			),

			array(
				'name'    => 'Yoast SEO',
				'slug'    => 'wordpress-seo',
				'version' => '19.0',
				'is_callable' => 'wpseo_init',
			),

			array(
				'name'    => 'Yoast Duplicate Post',
				'slug'    => 'duplicate-post',
				'version' => '4.4',
			),



		);

		return apply_filters( 'skeleton_block_theme_tgmpa_plugins', $plugins );
	}

	/**
	 *
	 */
	public function get_config() {
		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'theme-text-domain',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => get_template_directory() . '/lib/plugins/',
			// Default absolute path to bundled plugins.
			'menu'         => 'skeleton-block-theme-install-plugins',
			// Menu slug.
			'parent_slug'  => 'themes.php',
			// Parent menu slug.
			'capability'   => 'edit_theme_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
		);

		return apply_filters( 'skeleton_block_theme_tgmpa_config', $config );

	}

}