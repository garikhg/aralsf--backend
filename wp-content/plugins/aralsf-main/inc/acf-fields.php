<?php

/**
 * ACF Fields Functions
 *
 * Author: Garegin Hakobyan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// ACF JSON Sync
add_filter( 'acf/settings/save_json', function ( $path ) {
	// Update path to save ACF JSON files
	$path = plugin_dir_path( __FILE__ ) . '../acf-json';
	
	return $path;
} );

add_filter( 'acf/settings/load_json', function ( $paths ) {
	// Remove original path (optional)
	unset( $paths[0] );
	
	// Append path to load ACF JSON files
	$paths[] = plugin_dir_path( __FILE__ ) . '../acf-json';
	
	return $paths;
} );
