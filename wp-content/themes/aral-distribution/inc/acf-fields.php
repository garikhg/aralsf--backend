<?php
/**
 * ACF Blocks Register.
 *
 * @package Aral_Distribution
 * @since   Aral Distribution 1.0
 */

if ( ! function_exists( 'aral_distribution_acf_blocks_register' ) ) {
	/**
	 * Register ACF Blocks.
	 */
	function aral_distribution_acf_blocks_register() {
		// Check if function exists.
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}
		
		// Register ACF Blocks.
		acf_register_block_type(
			array(
				'name'            => 'categories-slider',
				'title'           => __( 'Categories Slider', 'aral-distribution' ),
				'description'     => __( 'A custom block for displaying categories slider.', 'aral-distribution' ),
				'render_template' => 'template-parts/blocks/categories-slider/template.php',
				'category'        => 'aral-distribution',
				'icon'            => 'images-alt2',
				'keywords'        => array( 'categories', 'slider' ),
			)
		);
		
		acf_register_block_type(
			array(
				'name'            => 'slider',
				'title'           => __( 'Slider', 'aral-distribution' ),
				'description'     => __( 'A custom block for displaying slider.', 'aral-distribution' ),
				'render_template' => 'template-parts/blocks/slider/template.php',
				'category'        => 'aral-distribution',
				'icon'            => 'images-alt2',
				'keywords'        => array( 'slider' ),
			)
		);
	}
	
	add_action( 'acf/init', 'aral_distribution_acf_blocks_register' );
}
