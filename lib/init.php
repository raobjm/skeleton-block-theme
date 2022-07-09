<?php
/**
 * Composer Auto Loader
 */
if ( ! file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	wp_die( esc_html__( 'Please run composer install before activating theme.' ) );
}
require_once get_template_directory() . '/vendor/autoload.php';

/**
 * Get Theme Constants
 */
require_once get_template_directory() . '/lib/constants.php';

/**
 * Get Helper functions
 */
require_once get_template_directory() . '/lib/helper-functions.php';

/**
 * Register CPTs
 */
require_once get_template_directory() . '/lib/register-cpt.php';

/**
 * Remove Comment System
 */
require_once get_template_directory() . '/lib/disable-comments.php';

/**
 * Navigation Menu Walkers
 */
require_once get_template_directory() . '/lib/menu/menu-hooks.php';
require_once get_template_directory() . '/lib/menu/walker/class-primary-walker.php';

/**
 * Register ACF Blocks for theme
 */
require_once get_template_directory() . '/lib/register-acf-blocks.php';