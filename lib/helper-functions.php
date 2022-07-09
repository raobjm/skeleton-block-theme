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