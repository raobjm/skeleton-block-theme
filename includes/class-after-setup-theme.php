<?php

namespace SkeletonBlockTheme;
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if class already defined, bail out
if ( class_exists( 'SkeletonBlockTheme\After_Setup_Theme' ) ) {
	return;
}


/**
 * This class will set up theme
 *
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 */
class After_Setup_Theme {

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

		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
	}

	/**
	 * Theme Setup like:
	 * add_theme_support , image sizes, menu register
	 * @hooked after_setup_theme
	 */
	public function setup_theme() {

		/*
		 * Theme Support
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'disable-custom-colors' );
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Image Sizes
		 */
		// Example:
		// add_image_size( 'hero', 2440, 1440 );

		/**
		 * Register Menus
		 */
		// Example:
		//register_nav_menus([
		//	'primary-menu' => __('Header Menu', 'theme-text-domain'),
		//	'secondary-menu' => __('Footer Menu', 'theme-text-domain'),
		//]);

	}

}