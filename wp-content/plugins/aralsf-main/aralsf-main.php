<?php
/**
 * Plugin Name: AralSf Core
 * Description: Core functionalities for the AralSf site.
 * Version: 1.0
 * Author: Garegin Hakobyan
 * Author URI: https://hakobyan.vercel.app/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'rest_api_init', function () {
	// Expose ACF fields in REST API response
	register_rest_field(
		'options',
		'acf',
		array(
			'get_callback' => function () {
				return get_fields( 'options' );
			},
			'schema'       => null,
		)
	);
} );

require_once plugin_dir_path( __FILE__ ) . 'inc/post-types.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/acf-fields.php';
