<?php
/**
 * Register custom post types
 *
 * @package AralSf
 * @since   1.0
 */

add_action( 'init', function () {
	$labels = array(
		'name'                     => 'Products',
		'singular_name'            => 'Product',
		'menu_name'                => 'Product',
		'all_items'                => 'All Product',
		'edit_item'                => 'Edit Product',
		'view_item'                => 'View Product',
		'view_items'               => 'View Product',
		'add_new_item'             => 'Add New Product',
		'add_new'                  => 'Add New Product',
		'new_item'                 => 'New Product',
		'parent_item_colon'        => 'Parent Product:',
		'search_items'             => 'Search Product',
		'not_found'                => 'No product found',
		'not_found_in_trash'       => 'No product found in Trash',
		'archives'                 => 'Product Archives',
		'attributes'               => 'Product Attributes',
		'insert_into_item'         => 'Insert into product',
		'uploaded_to_this_item'    => 'Uploaded to this product',
		'filter_items_list'        => 'Filter product list',
		'filter_by_date'           => 'Filter product by date',
		'items_list_navigation'    => 'Product list navigation',
		'items_list'               => 'Product list',
		'item_published'           => 'Product published.',
		'item_published_privately' => 'Product published privately.',
		'item_reverted_to_draft'   => 'Product reverted to draft.',
		'item_scheduled'           => 'Product scheduled.',
		'item_updated'             => 'Product updated.',
		'item_link'                => 'Product Link',
		'item_link_description'    => 'A link to a product.',
	);
	
	register_post_type( 'product',
		array(
			'labels'              => $labels,
			'public'              => true,
			'hierarchical'        => true,
			'show_in_nav_menus'   => false,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-products',
			'supports'            => array( 'title', 'thumbnail', ),
			'has_archive'         => true,
			'rewrite'             => array(
				'feeds' => false,
			),
			'delete_with_user'    => false,
			'show_in_graphql'     => true,
			'graphql_single_name' => 'product',
			'graphql_plural_name' => 'products',
		) );
} );

