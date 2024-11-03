<?php
/**
 * Functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

function aral_theme_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * This theme does not use a hard-coded <title> tag in the document head,
	 * WordPress will provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	// add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 1568, 9999 );
	
	register_nav_menus(
		array(
			'primary'           => esc_html__( 'Primary menu', 'araldistribution' ),
			'footer'            => esc_html__( 'Footer menu', 'araldistribution' ),
			'footer_categories' => esc_html__( 'Footer Categories menu', 'araldistribution' ),
		)
	);
	
	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	/*add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);*/
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'width'       => 300,
		'height'      => 100,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	// Add theme support for post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1568, 9999 );
	
	
	// Add theme support for selective refresh for widgets.
	// add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( [ './build/editor-style.css' ] );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
	// Add support for custom line height controls.
	add_theme_support( 'custom-line-height' );
	
	// Add support for experimental cover block spacing.
	add_theme_support( 'custom-spacing' );
	
	// Add support for custom units.
	// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
	add_theme_support( 'custom-units' );
	
	// Remove feed icon link from legacy RSS widget.
	add_filter( 'rss_widget_feed_link', '__return_empty_string' );
}

add_action( 'after_setup_theme', 'aral_theme_setup' );


function aral_theme_scripts() {
	wp_enqueue_script( 'araldistribution-script',
		get_template_directory_uri() . '/build/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	
	wp_enqueue_style( 'araldistribution-style',
		get_template_directory_uri() . '/build/main.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'wp_enqueue_scripts', 'aral_theme_scripts' );

function aral_register_acf_blocks() {
	$blocks = array(
		'page-hero',
		'contact-details',
		'text-editor',
		'media-and-text',
		'brand-partners',
		'brands-carousel',
	);
	
	foreach ( $blocks as $block ) {
		register_block_type(
			get_template_directory() . "/template-parts/blocks/$block/block.json"
		);
	}
}

add_action( 'acf/init', 'aral_register_acf_blocks' );

add_filter( 'get_the_archive_title', function ( $title ) {
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
} );
