<?php
/**
 * Functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


define( 'ALBEDO_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

function wpnext_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	
	add_theme_support( 'custom-header', array(
		'header-text' => array(
			'site-title',
			'site-description',
		),
		'height'      => 300,
		'width'       => 109,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	
	/**
	 * Register the navigation menus.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wpnext' ),
		'footer'  => esc_html__( 'Primary Menu', 'wpnext' ),
	) );
	
	load_theme_textdomain( 'wpnext', get_template_directory() . '/languages' );
	
	/**
	 * Register the editor color palette.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
	 */
	add_theme_support( 'editor-color-palette', [] );
	
	/**
	 * Register the editor font sizes.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
	 */
	add_theme_support( 'editor-font-sizes', [] );
	
	/**
	 * Register relative length units in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#support-custom-units
	 */
	add_theme_support( 'custom-units' );
	
	/**
	 * Enable support for custom line heights in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#supporting-custom-line-heights
	 */
	add_theme_support( 'custom-line-height' );
	
	/**
	 * Enable support for custom block spacing control in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#spacing-control
	 */
	add_theme_support( 'custom-spacing' );
	
	/**
	 * Disable custom colors in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
	 */
	add_theme_support( 'disable-custom-colors' );
	
	/**
	 * Disable custom color gradients in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-gradients
	 */
	// add_theme_support( 'disable-custom-gradients' );
	
	/**
	 * Disable custom font sizes in the editor.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
	 */
	add_theme_support( 'disable-custom-font-sizes' );
	
	/**
	 * Disable the default block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
	 */
	remove_theme_support( 'core-block-patterns' );
	
	/**
	 * Enable plugins to manage the document title.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * Enable post thumbnail support.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	 * Enable wide alignment support.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );
	
	/**
	 * Enable responsive embed support.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'responsive-embeds' );
	
	/**
	 * Enable HTML5 markup support.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	] );
}

add_action( 'after_setup_theme', 'wpnext_setup' );


if ( ! function_exists( 'filter_products_by_acf_field' ) ) {
	/**
	 * Filters the products by the value of a specific custom field.
	 *
	 * @param  array            $args     The original query arguments for filtering the products.
	 * @param  WP_REST_Request  $request  The REST request object.
	 *
	 * @return array The modified query arguments with meta_query added for filtering by custom field value.
	 */
	function filter_products_by_acf_field( $args, $request ): array {
		if ( ! empty( $request ) ) {
			if ( ! isset( $args['meta_query'] ) ) {
				$args['meta_query'] = array();
			}
			
			foreach ( $request->get_params() as $key => $value ) {
				if ( str_starts_with( $key, 'filter_' ) && ! empty( $value ) ) {
					$field = str_replace( 'filter_', '', $key );
					
					if ( str_contains( $value, '_AND_' ) ) {
						// Split the value parameter by '_AND_' to create an
						// array of value
						$values = explode( '_AND_', $value );
						
						// Sanitize each value
						$values = array_map( 'sanitize_text_field', $values );
						
						$args['meta_query'][] = array(
							'key'     => $field,
							'value'   => $values,
							'compare' => 'IN',
							// Adjust based on your needs ('=', 'LIKE', etc.)
						);
					} else {
						// If it's a single value, use a standard '=' comparison
						$args['meta_query'][] = array(
							'key'     => $field,
							'value'   => sanitize_text_field( $value ),
							'compare' => '=',
							// Adjust based on your needs ('=',
							// 'LIKE', etc.)
						);
					}
				}
			}
		}
		
		return $args;
	}
}
add_filter( 'rest_product_query', 'filter_products_by_acf_field', 10, 2 );


