<?php
/**
 * Custom template tags for this theme
 *
 * @package Aral_Distribution
 * @since   Aral Distribution 1.0
 */

/**
 * Display the products showing
 */
function aral_distribution_the_products_showing() {
	printf(
		'<p class="font-light">%s</p>',
		sprintf(
		/* translators: 1: current number of products, 2: total number of products */
			esc_html__( 'Showing %1$s of %2$s products', 'aral-distribution' ),
			$GLOBALS['wp_query']->post_count,
			$GLOBALS['wp_query']->found_posts
		),
	);
}

/**
 * Display the archive title based on the queried object
 */
function aral_distribution_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_tax() ) { // for custom post types
		$title = single_term_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	
	return $title;
}

add_filter( 'get_the_archive_title', 'aral_distribution_archive_title' );


if ( ! function_exists( 'aral_distribution_breadcrumbs' ) && function_exists( 'bcn_display' ) ) {
	/**
	 * Display the breadcrumbs
	 */
	function aral_distribution_breadcrumbs() {
		if ( function_exists( 'bcn_display' ) ) {
			echo '<nav class="breadcrumbs">';
			bcn_display();
			echo '</nav>';
		}
	}
}

