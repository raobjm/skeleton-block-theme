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

/**
 * Get Template Single Before
 */
if ( ! function_exists( 'bjm_get_template_single_before' ) ) :
	function bjm_get_template_single_before() {

		$before_template = null;

		$is_override_template = get_field( 'override_before_template', get_the_ID() );

		if ( $is_override_template ) {
			$custom_override_template = get_field( 'custom_before_template', get_the_ID() );
			if ( ! $custom_override_template ) {
				return null;
			} else {
				$before_template = $custom_override_template;
			}
		}

		if ( ! $before_template ) {
			$before_template = get_field( 'before_single_' . get_post_type(), 'options' );
		}
		if ( ! $before_template ) {
			$before_template = get_field( 'before_single', 'options' );
		}

		return $before_template;
	}
endif;

/**
 * Get Template Single Before
 */
if ( ! function_exists( 'bjm_get_template_single_after' ) ) :
	function bjm_get_template_single_after() {

		$after_template = null;

		$is_override_template = get_field( 'override_after_template', get_the_ID() );

		if ( $is_override_template ) {
			$custom_override_template = get_field( 'custom_after_template', get_the_ID() );
			if ( ! $custom_override_template ) {
				return null;
			} else {
				$after_template = $custom_override_template;
			}
		}

		if ( ! $after_template ) {
			$after_template = get_field( 'after_single_' . get_post_type(), 'options' );
		}
		if ( ! $after_template ) {
			$after_template = get_field( 'after_single', 'options' );
		}

		return $after_template;
	}
endif;

/**
 * @return string
 */
function bjm_get_archive_template_identifier() {

	if ( is_search() ) {
		$template_identifier = 'search';
	} else {
		$queried_object = get_queried_object();

		// if it's a WP_Term query, get the associated post type
		if ( 'WP_Term' === get_class( $queried_object ) ) {
			if ( $queried_object->taxonomy ) {
				$taxObject     = get_taxonomy( $queried_object->taxonomy );
				$postTypeArray = $taxObject->object_type;
				// We should only get the post_type template if the associated post_type s only one
				// otherwise, it may show a post_type archive template for different post_type
				if ( $postTypeArray && 1 === count( $postTypeArray ) ) {
					// return the
					return $postTypeArray[0];
				}
			}
		}

		$template_identifier = get_queried_object()->name;
	}

	return ( is_string( $template_identifier ) ) ? $template_identifier : '';

}


if ( ! function_exists( 'bjm_get_template_archive_before' ) ) :

	function bjm_get_template_archive_before() {

		$template_identifier = bjm_get_archive_template_identifier();

		$before_template = get_field( 'before_archive_' . $template_identifier, 'options' );

		if ( ! $before_template ) {
			$before_template = get_field( 'before_archive', 'options' );
		}

		return $before_template;
	}

endif;

if ( ! function_exists( 'bjm_get_template_archive_after' ) ) :

	function bjm_get_template_archive_after() {

		$template_identifier = bjm_get_archive_template_identifier();

		$after_template = get_field( 'after_archive_' . $template_identifier, 'options' );

		if ( ! $after_template ) {
			$after_template = get_field( 'after_archive', 'options' );
		}

		return $after_template;

	}

endif;