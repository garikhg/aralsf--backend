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
