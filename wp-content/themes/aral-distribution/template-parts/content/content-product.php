<?php
/**
 * The template for displaying product content
 *
 * @package     Aral_Distribution
 * @since       Aral Distribution 1.0
 */


$product_description       = get_field( 'description' ) ?? '';
$product_short_description = get_field( 'short_description' ) ?? '';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
		<?php the_content(); ?>
    </div><!-- .entry-content -->
    
</div><!-- #post-<?php the_ID(); ?> -->

