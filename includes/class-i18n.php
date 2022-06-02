<?php
namespace SkeletonBlockTheme;
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bjmdigital.com.au/
 * @since      0.0.1
 *
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.0.1
 * @package    SkeletonBlockTheme
 * @subpackage SkeletonBlockTheme/includes
 * @author     BJM <developers@bjmdigital.com.au>
 */
class i18N {
	/** @noinspection SpellCheckingInspection */


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'blokki',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}


}
