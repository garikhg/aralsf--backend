<?php
/**
 * The template for displaying all single posts
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

get_header();
?>

<?php get_template_part( 'template-parts/header/page-header' ); ?>
<div class="page-content">
	<?php the_content(); ?>
</div>

<?php get_footer(); ?>

