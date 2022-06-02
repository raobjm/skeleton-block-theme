<?php

/**
 * Get Build URL path
 */
if ( ! function_exists( 'bjm_get_build_url' ) ) :
	function bjm_get_build_url( $file_name_with_sub_dir ) {
		return trailingslashit( get_template_directory_uri() ) . trailingslashit( 'build' ) . $file_name_with_sub_dir;
	}
endif;

/**
 * Get Build Dir path
 */
if ( ! function_exists( 'bjm_get_build_dir' ) ) :
	function bjm_get_build_dir( $file_name_with_sub_dir ) {
		return get_template_directory() . DIRECTORY_SEPARATOR . 'build' . DIRECTORY_SEPARATOR . $file_name_with_sub_dir;
	}
endif;
