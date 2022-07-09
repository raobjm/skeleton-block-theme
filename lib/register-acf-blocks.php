<?php

/**
 * Register Layout Block: Header
 * @param $blocks
 *
 * @return mixed
 */
function bjm_register_layout_block_main_header($blocks){

	$blocks[] = [
		'name'        => 'layout-header-main',
		'title'       => __( 'Main Header' ),
		'description' => __( 'Main Header for theme' ),
		'category'    => 'theme',
		'icon'        => 'schedule',
		'keywords'    => [ 'header', 'bjm', 'acf', 'layout' ],
	];

	return $blocks;
}
add_filter( SKELETON_BLOCK_THEME_PREFIX . 'acf_blocks_config', 'bjm_register_layout_block_main_header');


/**
 * Register Layout Block: Footer
 * @param $blocks
 *
 * @return mixed
 */
function bjm_register_layout_block_main_footer($blocks){

	$blocks[] = [
		'name'        => 'layout-footer-main',
		'title'       => __( 'Main Footer' ),
		'description' => __( 'Main Footer for theme' ),
		'category'    => 'theme',
		'icon'        => 'schedule',
		'keywords'    => [ 'footer', 'bjm', 'acf', 'layout' ],
	];

	return $blocks;
}
add_filter( SKELETON_BLOCK_THEME_PREFIX . 'acf_blocks_config', 'bjm_register_layout_block_main_footer');


function bjm_register_template_block_single_before($blocks){

	$blocks[] = [
		'name'        => 'template-single-before',
		'title'       => __( 'Template Single Before' ),
		'description' => __( 'The block will display the Before Template for Single' ),
		'category'    => 'theme',
		'icon'        => 'welcome-widgets-menus',
		'keywords'    => [ 'single', 'bjm', 'acf', 'layout', 'template', 'before' ],
	];

	return $blocks;
}
add_filter( SKELETON_BLOCK_THEME_PREFIX . 'acf_blocks_config', 'bjm_register_template_block_single_before');