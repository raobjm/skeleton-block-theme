<?php

// First, this will disable support for comments and trackbacks in post types
function skeleton_block_theme_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
}

add_action( 'admin_init', 'skeleton_block_theme_disable_comments_post_types_support' );

add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Finally, hide any existing comments that are on the site.
function skeleton_block_theme_disable_comments_hide_existing_comments( $comments ) {
	$comments = array();

	return $comments;
}

add_filter( 'comments_array', 'skeleton_block_theme_disable_comments_hide_existing_comments', 10, 2 );