<?php
/**
 * Template functions.
 *
 * @package Aral_Distribution
 * @since   Aral Distribution 1.0
 */

// Add support for SVG and WebP uploads
function aral_distribution_mime_types( $mimes ) {
	// Allow SVG files
	$mimes['svg'] = 'image/svg+xml';
	// Allow WebP files
	$mimes['webp'] = 'image/webp';
	
	return $mimes;
}

add_filter( 'upload_mimes', 'aral_distribution_mime_types' );


function aral_distribution_age_verification() {
	if ( ! isset( $_COOKIE['age_verification'] ) || $_COOKIE['age_verification'] !== 'verified' ) {
		if ( ! is_front_page() && ! is_home() ) {
			wp_redirect( home_url( '/' ) );
			exit;
		}
	}
}

add_action( 'template_redirect', 'aral_distribution_age_verification' );
