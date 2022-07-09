<?php
namespace SkeletonBlockTheme;
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if class already defined, bail out
if ( class_exists( 'SkeletonBlockTheme\Primary_Walker' ) ) {
	return;
}


/**
 * Add some extra mega menu stuff to the main menu.
 */
class Primary_Walker extends \Walker_Nav_Menu {
	private $current;

	function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {

		parent::start_el( $output, $item, $depth, $args, $id );

		$this->current = $item;
	}

	function start_lvl( &$output, $depth = 0, $args = [] ) {
		global $wpdb;

		if ($depth === 0 && $args->walker->has_children) {
			$children_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key = '_menu_item_menu_item_parent' AND meta_value = %d", [$this->current->ID]));
		}
		
		ob_start();

		get_template_part( 'lib/menu/walker/primary-walker', 'start', [
			'depth' => $depth,
			'id'    => $this->current->ID,
			'menu_item_parent' => $this->current->menu_item_parent,
			'children_count' => $children_count ?? 0
		] );

		$output .= ob_get_clean();
	}

	function end_lvl( &$output, $depth = 0, $args = [] ) {
		ob_start();

		get_template_part( 'lib/menu/walker/primary-walker', 'end', [
			'depth' => $depth,
			'id'    => $this->current->ID
		] );

		$output .= ob_get_clean();
	}

}
