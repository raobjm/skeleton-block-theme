<?php
/**
 * Composer Auto Loader
 */
if ( ! file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	wp_die( esc_html__( 'Please run composer install before activating theme.' ) );
}
require get_template_directory() . '/vendor/autoload.php';

/**
 * Get Theme Constants
 */
require get_template_directory() . '/lib/constants.php';

/**
 * Get Helper functions
 */
require get_template_directory() . '/lib/helper-functions.php';