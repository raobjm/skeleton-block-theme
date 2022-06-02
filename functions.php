<?php
/**
 * Required functions parts
 */
require get_template_directory() . '/lib/init.php';
/**
 * Theme Bootstrap.
 * @since    0.0.1
 */
function SkeletonBlockTheme() {

	return SkeletonBlockTheme\Init::get_instance();

}

SkeletonBlockTheme();