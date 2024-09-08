<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'aral_setup' ) ) {
	function aral_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/**
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
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
		
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'aral' ),
			'footer'  => __( 'Footer Menu', 'aral' ),
		) );
		
		
		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		
		add_theme_support( 'html5', array(
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		) );
		
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		
		add_theme_support(
			'custom-logo',
			array(
				'height'               => 300,
				'width'                => 300,
				'flex-height'          => true,
				'flex-width'           => true,
				'unlink-homepage-logo' => false,
				'header-text'          => array(
					'site-title',
					'site-description',
				),
			)
		);
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Add support for Block Styles.
		add_theme_support( 'align-wide' );
		
		// Add support for editor styles.
		add_theme_support( 'editor-style' );
		add_editor_style( './style-editor.css' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}
}

add_action( 'after_setup_theme', 'aral_setup' );

function aral_custom_width() {
	$GLOBALS['content_width'] = apply_filters( 'aral_custom_width', 1400 );
}

add_action( 'after_setup_theme', 'aral_custom_width', 0 );

function aral_scripts() {
	wp_enqueue_script( 'aral-theme-script',
		get_template_directory_uri() . '/dist/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	
	wp_enqueue_style( 'aral-theme-style',
		get_template_directory_uri() . '/dist/assets/css/main.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'wp_enqueue_scripts', 'aral_scripts' );
