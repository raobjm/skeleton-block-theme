<?php

function bjm_register_cpts_faq() {
	/**
	 * Post Type: FAQs.
	 */

	$labels = [
		"name"                     => __( "FAQs", "theme-text-domain" ),
		"singular_name"            => __( "FAQ", "theme-text-domain" ),
		"menu_name"                => __( "FAQs", "theme-text-domain" ),
		"all_items"                => __( "All FAQs", "theme-text-domain" ),
		"add_new"                  => __( "Add new", "theme-text-domain" ),
		"add_new_item"             => __( "Add new FAQ", "theme-text-domain" ),
		"edit_item"                => __( "Edit FAQ", "theme-text-domain" ),
		"new_item"                 => __( "New FAQ", "theme-text-domain" ),
		"view_item"                => __( "View FAQ", "theme-text-domain" ),
		"view_items"               => __( "View FAQs", "theme-text-domain" ),
		"search_items"             => __( "Search FAQs", "theme-text-domain" ),
		"not_found"                => __( "No FAQs found", "theme-text-domain" ),
		"not_found_in_trash"       => __( "No FAQs found in trash", "theme-text-domain" ),
		"parent"                   => __( "Parent FAQ:", "theme-text-domain" ),
		"featured_image"           => __( "Featured image for this FAQ", "theme-text-domain" ),
		"set_featured_image"       => __( "Set featured image for this FAQ", "theme-text-domain" ),
		"remove_featured_image"    => __( "Remove featured image for this FAQ", "theme-text-domain" ),
		"use_featured_image"       => __( "Use as featured image for this FAQ", "theme-text-domain" ),
		"archives"                 => __( "FAQ archives", "theme-text-domain" ),
		"insert_into_item"         => __( /** @lang text */ 'Insert into FAQ', "theme-text-domain" ),
		"uploaded_to_this_item"    => __( "Upload to this FAQ", "theme-text-domain" ),
		"filter_items_list"        => __( "Filter FAQs list", "theme-text-domain" ),
		"items_list_navigation"    => __( "FAQs list navigation", "theme-text-domain" ),
		"items_list"               => __( "FAQs list", "theme-text-domain" ),
		"attributes"               => __( "FAQs attributes", "theme-text-domain" ),
		"name_admin_bar"           => __( "FAQ", "theme-text-domain" ),
		"item_published"           => __( "FAQ published", "theme-text-domain" ),
		"item_published_privately" => __( "FAQ published privately.", "theme-text-domain" ),
		"item_reverted_to_draft"   => __( "FAQ reverted to draft.", "theme-text-domain" ),
		"item_scheduled"           => __( "FAQ scheduled", "theme-text-domain" ),
		"item_updated"             => __( "FAQ updated.", "theme-text-domain" ),
		"parent_item_colon"        => __( "Parent FAQ:", "theme-text-domain" ),
	];

	$args = [
		"label"                 => __( "FAQs", "theme-text-domain" ),
		"labels"                => $labels,
		"description"           => "",
		"public"                => true,
		"publicly_queryable"    => false, // No Single page url
		"show_ui"               => true,
		"show_in_rest"          => true,
		"rest_base"             => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive"           => false,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"delete_with_user"      => false,
		"exclude_from_search"   => true,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => false,
		"rewrite"               => [ "slug" => "faq", "with_front" => false ],
		"query_var"             => true,
		"menu_icon"             => "dashicons-info-outline",
		"supports"              => [ "title", "editor" ],
		"show_in_graphql"       => false,
	];

	register_post_type( "bjm_faq", $args );
}

add_action( 'init', 'bjm_register_cpts_faq' );

function bjm_register_cpts_testimonial() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name"                     => __( "Testimonials", "theme-text-domain" ),
		"singular_name"            => __( "Testimonial", "theme-text-domain" ),
		"menu_name"                => __( "Testimonials", "theme-text-domain" ),
		"all_items"                => __( "All Testimonials", "theme-text-domain" ),
		"add_new"                  => __( "Add new", "theme-text-domain" ),
		"add_new_item"             => __( "Add new Testimonial", "theme-text-domain" ),
		"edit_item"                => __( "Edit Testimonial", "theme-text-domain" ),
		"new_item"                 => __( "New Testimonial", "theme-text-domain" ),
		"view_item"                => __( "View Testimonial", "theme-text-domain" ),
		"view_items"               => __( "View Testimonials", "theme-text-domain" ),
		"search_items"             => __( "Search Testimonials", "theme-text-domain" ),
		"not_found"                => __( "No Testimonials found", "theme-text-domain" ),
		"not_found_in_trash"       => __( "No Testimonials found in trash", "theme-text-domain" ),
		"parent"                   => __( "Parent Testimonial:", "theme-text-domain" ),
		"featured_image"           => __( "Featured image for this Testimonial", "theme-text-domain" ),
		"set_featured_image"       => __( "Set featured image for this Testimonial", "theme-text-domain" ),
		"remove_featured_image"    => __( "Remove featured image for this Testimonial", "theme-text-domain" ),
		"use_featured_image"       => __( "Use as featured image for this Testimonial", "theme-text-domain" ),
		"archives"                 => __( "Testimonial archives", "theme-text-domain" ),
		"insert_into_item"         => __( /** @lang text */ 'Insert into Testimonial', "theme-text-domain" ),
		"uploaded_to_this_item"    => __( "Upload to this Testimonial", "theme-text-domain" ),
		"filter_items_list"        => __( "Filter Testimonials list", "theme-text-domain" ),
		"items_list_navigation"    => __( "Testimonials list navigation", "theme-text-domain" ),
		"items_list"               => __( "Testimonials list", "theme-text-domain" ),
		"attributes"               => __( "Testimonials attributes", "theme-text-domain" ),
		"name_admin_bar"           => __( "Testimonial", "theme-text-domain" ),
		"item_published"           => __( "Testimonial published", "theme-text-domain" ),
		"item_published_privately" => __( "Testimonial published privately.", "theme-text-domain" ),
		"item_reverted_to_draft"   => __( "Testimonial reverted to draft.", "theme-text-domain" ),
		"item_scheduled"           => __( "Testimonial scheduled", "theme-text-domain" ),
		"item_updated"             => __( "Testimonial updated.", "theme-text-domain" ),
		"parent_item_colon"        => __( "Parent Testimonial:", "theme-text-domain" ),
	];

	$args = [
		"label"                 => __( "Testimonials", "theme-text-domain" ),
		"labels"                => $labels,
		"description"           => "",
		"public"                => true,
		"publicly_queryable"    => false,
		"show_ui"               => true,
		"show_in_rest"          => true,
		"rest_base"             => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive"           => false,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"delete_with_user"      => false,
		"exclude_from_search"   => true,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => false,
		"rewrite"               => [ "slug" => "testimonial", "with_front" => true ],
		"query_var"             => true,
		"menu_icon"             => "dashicons-format-quote",
		"supports"              => [ "title", "editor", "thumbnail", "excerpt", "author" ],
		"show_in_graphql"       => false,
	];

	register_post_type( "bjm_testimonial", $args );
}

add_action( 'init', 'bjm_register_cpts_testimonial' );

function bjm_register_cpts_resource() {

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		"name"                     => __( "Resources", "theme-text-domain" ),
		"singular_name"            => __( "Resource", "theme-text-domain" ),
		"menu_name"                => __( "Resources", "theme-text-domain" ),
		"all_items"                => __( "All Resources", "theme-text-domain" ),
		"add_new"                  => __( "Add new", "theme-text-domain" ),
		"add_new_item"             => __( "Add new Resource", "theme-text-domain" ),
		"edit_item"                => __( "Edit Resource", "theme-text-domain" ),
		"new_item"                 => __( "New Resource", "theme-text-domain" ),
		"view_item"                => __( "View Resource", "theme-text-domain" ),
		"view_items"               => __( "View Resources", "theme-text-domain" ),
		"search_items"             => __( "Search Resources", "theme-text-domain" ),
		"not_found"                => __( "No Resources found", "theme-text-domain" ),
		"not_found_in_trash"       => __( "No Resources found in trash", "theme-text-domain" ),
		"parent"                   => __( "Parent Resource:", "theme-text-domain" ),
		"featured_image"           => __( "Featured image for this Resource", "theme-text-domain" ),
		"set_featured_image"       => __( "Set featured image for this Resource", "theme-text-domain" ),
		"remove_featured_image"    => __( "Remove featured image for this Resource", "theme-text-domain" ),
		"use_featured_image"       => __( "Use as featured image for this Resource", "theme-text-domain" ),
		"archives"                 => __( "Resource archives", "theme-text-domain" ),
		"insert_into_item"         => __( /** @lang text */ "Insert into Resource", "theme-text-domain" ),
		"uploaded_to_this_item"    => __( "Upload to this Resource", "theme-text-domain" ),
		"filter_items_list"        => __( "Filter Resources list", "theme-text-domain" ),
		"items_list_navigation"    => __( "Resources list navigation", "theme-text-domain" ),
		"items_list"               => __( "Resources list", "theme-text-domain" ),
		"attributes"               => __( "Resources attributes", "theme-text-domain" ),
		"name_admin_bar"           => __( "Resource", "theme-text-domain" ),
		"item_published"           => __( "Resource published", "theme-text-domain" ),
		"item_published_privately" => __( "Resource published privately.", "theme-text-domain" ),
		"item_reverted_to_draft"   => __( "Resource reverted to draft.", "theme-text-domain" ),
		"item_scheduled"           => __( "Resource scheduled", "theme-text-domain" ),
		"item_updated"             => __( "Resource updated.", "theme-text-domain" ),
		"parent_item_colon"        => __( "Parent Resource:", "theme-text-domain" ),
	];

	$args = [
		"label"                 => __( "Resources", "theme-text-domain" ),
		"labels"                => $labels,
		"description"           => "",
		"public"                => true,
		"publicly_queryable"    => true,
		"show_ui"               => true,
		"show_in_rest"          => true,
		"rest_base"             => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive"           => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"delete_with_user"      => false,
		"exclude_from_search"   => false,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => false,
		"rewrite"               => [ "slug" => "resources", "with_front" => true ],
		"query_var"             => true,
		"menu_icon"             => "dashicons-feedback",
		"supports"              => [ "title", "editor", "thumbnail", "excerpt", "author", "revisions" ],
		"show_in_graphql"       => false,
	];

	register_post_type( "bjm_resource", $args );
}

add_action( 'init', 'bjm_register_cpts_resource' );

function bjm_register_taxonomy_testimonial_cat() {

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name"                       => __( "Testimonial Categories", "theme-text-domain" ),
		"singular_name"              => __( "Testimonial Category", "theme-text-domain" ),
		"menu_name"                  => __( "Testimonial Categories", "theme-text-domain" ),
		"all_items"                  => __( "All Testimonial Categories", "theme-text-domain" ),
		"edit_item"                  => __( "Edit Testimonial Category", "theme-text-domain" ),
		"view_item"                  => __( "View Testimonial Category", "theme-text-domain" ),
		"update_item"                => __( "Update Testimonial Category name", "theme-text-domain" ),
		"add_new_item"               => __( "Add new Testimonial Category", "theme-text-domain" ),
		"new_item_name"              => __( "New Testimonial Category name", "theme-text-domain" ),
		"parent_item"                => __( "Parent Testimonial Category", "theme-text-domain" ),
		"parent_item_colon"          => __( "Parent Testimonial Category:", "theme-text-domain" ),
		"search_items"               => __( "Search Testimonial Categories", "theme-text-domain" ),
		"popular_items"              => __( "Popular Testimonial Categories", "theme-text-domain" ),
		"separate_items_with_commas" => __( "Separate Testimonial Categories with commas", "theme-text-domain" ),
		"add_or_remove_items"        => __( "Add or remove Testimonial Categories", "theme-text-domain" ),
		"choose_from_most_used"      => __( "Choose from the most used Testimonial Categories", "theme-text-domain" ),
		"not_found"                  => __( "No Testimonial Categories found", "theme-text-domain" ),
		"no_terms"                   => __( "No Testimonial Categories", "theme-text-domain" ),
		"items_list_navigation"      => __( "Testimonial Categories list navigation", "theme-text-domain" ),
		"items_list"                 => __( "Testimonial Categories list", "theme-text-domain" ),
		"back_to_items"              => __( "Back to Testimonial Categories", "theme-text-domain" ),
	];


	$args = [
		"label"                 => __( "Testimonial Categories", "theme-text-domain" ),
		"labels"                => $labels,
		"public"                => true,
		"publicly_queryable"    => false,
		"hierarchical"          => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"query_var"             => true,
		"rewrite"               => [ 'slug' => 'testimonial-category', 'with_front' => true, ],
		"show_admin_column"     => true,
		"show_in_rest"          => true,
		"rest_base"             => "bjm_testimonial_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit"    => true,
		"show_in_graphql"       => false,
	];
	register_taxonomy( "bjm_testimonial_cat", [ "bjm_testimonial" ], $args );
}

add_action( 'init', 'bjm_register_taxonomy_testimonial_cat' );

function bjm_register_taxonomy_resource_cat() {

	/**
	 * Taxonomy: Resource Categories.
	 */

	$labels = [
		"name"                       => __( "Resource Categories", "theme-text-domain" ),
		"singular_name"              => __( "Resource Category", "theme-text-domain" ),
		"menu_name"                  => __( "Resource Categories", "theme-text-domain" ),
		"all_items"                  => __( "All Resource Categories", "theme-text-domain" ),
		"edit_item"                  => __( "Edit Resource Category", "theme-text-domain" ),
		"view_item"                  => __( "View Resource Category", "theme-text-domain" ),
		"update_item"                => __( "Update Resource Category name", "theme-text-domain" ),
		"add_new_item"               => __( "Add new Resource Category", "theme-text-domain" ),
		"new_item_name"              => __( "New Resource Category name", "theme-text-domain" ),
		"parent_item"                => __( "Parent Resource Category", "theme-text-domain" ),
		"parent_item_colon"          => __( "Parent Resource Category:", "theme-text-domain" ),
		"search_items"               => __( "Search Resource Categories", "theme-text-domain" ),
		"popular_items"              => __( "Popular Resource Categories", "theme-text-domain" ),
		"separate_items_with_commas" => __( "Separate Resource Categories with commas", "theme-text-domain" ),
		"add_or_remove_items"        => __( "Add or remove Resource Categories", "theme-text-domain" ),
		"choose_from_most_used"      => __( "Choose from the most used Resource Categories", "theme-text-domain" ),
		"not_found"                  => __( "No Resource Categories found", "theme-text-domain" ),
		"no_terms"                   => __( "No Resource Categories", "theme-text-domain" ),
		"items_list_navigation"      => __( "Resource Categories list navigation", "theme-text-domain" ),
		"items_list"                 => __( "Resource Categories list", "theme-text-domain" ),
		"back_to_items"              => __( "Back to Resource Categories", "theme-text-domain" ),
	];


	$args = [
		"label"                 => __( "Resource Categories", "theme-text-domain" ),
		"labels"                => $labels,
		"public"                => true,
		"publicly_queryable"    => false,
		"hierarchical"          => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"query_var"             => true,
		"rewrite"               => [ 'slug' => 'resource-category', 'with_front' => true, ],
		"show_admin_column"     => true,
		"show_in_rest"          => true,
		"rest_base"             => "bjm_resource_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit"    => true,
		"show_in_graphql"       => false,
	];
	register_taxonomy( "bjm_resource_cat", [ "bjm_resource" ], $args );

}

add_action( 'init', 'bjm_register_taxonomy_resource_cat' );
