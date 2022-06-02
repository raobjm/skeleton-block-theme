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

	public function __construct( ) {
		$this->register_hooks();
	}

	/**
	 * Register required hooks
	 */
	public function register_hooks() {

		/**
		 * Enqueue Styles
		 */
//		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
//		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		/**
		 * Enqueue Scripts
		 */
//		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
//		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );


	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blokki\Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blokki\Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blokki\Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blokki\Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.js', array( 'jquery' ), $this->version, true );

	}

}
