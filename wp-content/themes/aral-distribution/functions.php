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
	
	add_image_size( 'aral-product-featured-image', 760, 760 );
}

add_action( 'after_setup_theme', 'aral_theme_setup' );


function aral_theme_scripts() {
	// Lucide icons
	wp_enqueue_script( 'lucide',
		'https://unpkg.com/lucide@latest/dist/umd/lucide.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	
	wp_enqueue_script( 'lucide-icons',
		'https://unpkg.com/lucide@latest',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	
	wp_enqueue_script( 'aral-distribution-script',
		get_template_directory_uri() . '/build/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	
	wp_enqueue_style( 'aral-distribution-style',
		get_template_directory_uri() . '/build/main.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'wp_enqueue_scripts', 'aral_theme_scripts' );

function aral_register_acf_blocks() {
	$blocks = array(
		'slider',
		'page-hero',
		'contact-details',
		'text-editor',
		'media-and-text',
		'brand-partners',
		'brand-partners-carousel',
		'categories-list',
		'categories-slider',
	);
	
	foreach ( $blocks as $block ) {
		register_block_type(
			get_template_directory() . "/template-parts/blocks/$block/block.json"
		);
	}
}

add_action( 'acf/init', 'aral_register_acf_blocks' );

function aral_distribution_favicon() {
	$bloginfo_name = get_bloginfo( 'name' );
	?>
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg"/>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"/>
    <meta name="apple-mobile-web-app-title" content="<?php echo $bloginfo_name; ?>"/>
    <link rel="manifest" href="/site.webmanifest"/>
	<?php
}

add_action( 'wp_head', 'aral_distribution_favicon' );

require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/template-tags.php';

//if ( class_exists( 'ACF' ) ) {
//    require_once get_template_directory() . '/inc/acf-fields.php';
//}
