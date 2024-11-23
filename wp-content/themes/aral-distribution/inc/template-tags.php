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


if ( ! function_exists( 'aral_distribution_the_post_navigation' ) ) {
	/**
	 * Display the post navigation
	 */
	function aral_distribution_the_post_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl()
						? '<i data-lucide="move-right" class="lucide-icon size-6"></i>'
						: '<i data-lucide="move-left" class="lucide-icon w-6 h-6"></i>',
					wp_kses(
						__( '<span class="nav-short sr-only">Previews</span>', 'aral-distribution' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					)
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					wp_kses(
						__( '<span class="nav-short sr-only">Next</span>', 'aral-distribution' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					is_rtl()
						? '<i data-lucide="move-left" class="lucide-icon w-6 h-6"></i>'
						: '<i data-lucide="move-right" class="lucide-icon size-6"></i>'
				),
			)
		);
	}
}
