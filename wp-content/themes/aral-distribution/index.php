<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AralDistribution
 * @since   Aral Distribution 1.0
 */

get_header();
?>

<?php if ( have_posts() ): ?>
    <header class="page-header has-breadcrumbs">
        <div class="container">
			<?php aral_distribution_breadcrumbs() ?>
        </div>
    </header>

    <div class="page-content container">
		<?php the_archive_title( '<h1 class="archive-title page-title">', '</h1>' ); ?>
        <div class="text-gray-600 flex justify-between mb-8">
			<?php aral_distribution_the_products_showing() ?>
        </div>
        <div class="products grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
			<?php while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content-product' );
			} ?>
        </div>
    </div>

<?php else: ?>
	
	<?php get_template_part( 'template-parts/content/content-none' ); ?>

<?php endif; ?>

<?php
get_footer();
