<?php

/**
 * Menu Item Class filters
 */

/**
 * check if the menu location is primary
 *
 * @param $args
 *
 * @return bool
 */
function bjm_is_primary_menu( $args ) {
	return isset( $args->theme_location ) && 'primary-menu' === $args->theme_location;
}

/**
 * check if the menu location is secondary
 *
 * @param $args
 *
 * @return bool
 */
function bjm_is_secondary_menu( $args ) {
	return isset( $args->theme_location ) && 'secondary-menu' === $args->theme_location;
}

/**
 * Get ACF fa-icon for the menu item
 *
 * @param $menu_item_id
 *
 * @return mixed
 */
function bjm_get_icon_for_menu_item( $menu_item_id ) {

	$menu_item_type = get_post_meta( $menu_item_id, '_menu_item_type', true );
	$object_id      = get_post_meta( $menu_item_id, '_menu_item_object_id', true );

	if ( $menu_item_type === 'post_type' ) {
		$icon = get_field( 'icon', $object_id );
	} else {
		$taxonomy = get_post_meta( $menu_item_id, '_menu_item_object', true );
		$icon     = get_field( 'icon', $taxonomy . '_' . $object_id );
	}

	return $icon;
}


add_filter( 'nav_menu_css_class', function ( $class_array, $item, $args, $depth ) {

	if ( ! bjm_is_primary_menu( $args ) ) {
		return $class_array;
	}

	$menu_type = get_field( 'link_type', $item->ID );
	if ( $menu_type ) {
		$class_array[] = 'bjm-link-type-' . $menu_type;

//		if ( 'button' === $menu_type ) {
//			$class_array[] = 'is-style-secondary-outline';
//			$class_array[] = 'wp-block-button';
//		}

		if ( 'image' === $menu_type ) {
			$image_style = get_field( 'image_style', $item->ID );
			if ( $image_style ) {
				$class_array[] = 'image-style-' . $image_style;
			}

		}

//		if ( ! wp_is_mobile() ) {
			$image_background = get_field( 'background', $item->ID );
			$gradient         = get_field( 'gradient', $item->ID );
			$background_color = get_field( 'color', $item->ID );
			if ( 'gradient' === $image_background && $gradient ) {
				$class_array[] = sprintf( 'has-%s-gradient-background', $gradient );
			}
			if ( 'color' === $image_background && $background_color ) {
				$class_array[] = sprintf( 'has-%s-background-color', $background_color );
			}
//		}

	}
	$show_icon = get_field( 'show_icon', $item->ID );
	if ( $show_icon ) {
		$class_array[] = 'has-icon';
	}

	$column_span = get_field( 'column_span', $item->ID );	
	if ( $column_span ) {
		$class_array[] = 'menu-col-span-' . $column_span;
	}

	$row_span = get_field( 'row_span', $item->ID );
	if ( $row_span ) {
		$class_array[] = 'menu-row-span-' . $row_span;
	}

	$bold_description = get_field( 'bold_description', $item->ID );
	if ( $bold_description ) {
		$class_array[] = 'bold-description';
	}

	$visibility = get_field( 'visibility', $item->ID );
	if ( $visibility ) {
		$class_array[] = $visibility;
	}
	
	$child_columns = get_field( 'child_columns', $item->ID );
	if($child_columns){
		$class_array[] = 'menu-child-columns-'. $child_columns;
	}

	$has_right_border = get_field( 'has_right_border', $item->ID );
	if($has_right_border){
		$class_array[] = 'has-right-border';
	}

	$has_bottom_border = get_field( 'has_bottom_border', $item->ID );
	if( $has_bottom_border){
		$class_array[] = 'has-bottom-border';
	}

	return $class_array;
}, 10, 4 );


add_filter( 'nav_menu_item_title', function ( $title, $item, $args, $depth ) {

	if ( ! bjm_is_primary_menu( $args ) ) {
		return $title;
	}
	$menu_type = get_field( 'link_type', $item->ID );
	if ( 'text' === $menu_type ) {
		$title = get_field( 'text', $item->ID );
	}

	if ( 'divider' === $menu_type ) {
		$title = sprintf('<hr/>');
	}

	$card_image_id = get_field( 'image', $item->ID );
	$image_size    = 'left' === get_field( 'image_style', $item->ID ) ? 'thumbnail' : 'large';

	if ( $card_image_id > 0  ) :

		$menu_title = $title;
		$title      = wp_get_attachment_image( $card_image_id, $image_size );
		$title      .= sprintf( '<span class="menu-item-title">%s</span>',
			$menu_title
		);

	endif;

	if ( $item->description && (! wp_is_mobile() || 'image' === $menu_type )) {
		$title .= sprintf( '<span class="menu-description">%s</span>', $item->description );
	}


	$show_icon = get_field( 'show_icon', $item->ID );

	if ( $show_icon ):
		// Custom Icon defined in menu item
		$icon = get_field( 'custom_icon', $item->ID );

		// if not found, try to get from post/taxonomy
		if ( ! $icon ) {
			$icon = bjm_get_icon_for_menu_item( $item->ID );
		}


		if ( $icon ) {
			$title = sprintf( '<div class="menu-icon-card"><span class="bjm-icon-wrapper">%s</span><div>%s </div></div>',
				$icon,
				$title
			);
		}

	endif; // $show_icon


	return $title;

}, 10, 4 );

add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args, $depth ) {

	if ( ! bjm_is_primary_menu( $args ) ) {
		return $atts;
	}

	$menu_type = get_field( 'link_type', $item->ID );
	if ( $menu_type ) {
//		if ( 'button' === $menu_type ) {
//			$atts['class'] = 'wp-block-button__link';
//		}
	}

	return $atts;

}, 10, 4 );

/**
 * Change menu item output
 */
add_filter( 'walker_nav_menu_start_el', function ( $item_output, $item, $depth, $args ) {

	if ( 'post' === get_field( 'link_type', $item->ID ) ) {
		ob_start();
		get_template_part( 'lib/menu/menu', 'post', [ 'post' => get_post($item->object_id) ] );
		$item_output = ob_get_clean();
	}


	return $item_output;
}, 10, 4 );

