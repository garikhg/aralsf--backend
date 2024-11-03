<?php
/**
 * The template for displaying archive pages
 *
 * @link        https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Aral_Distribution
 * @since       Aral Distribution 1.0
 */

get_header();

$archive_description = get_the_archive_description();
?>
<?php if ( have_posts() ): ?>
    <header class="page-header has-breadcrumbs">
        <div class="container">
			<?php aral_distribution_breadcrumbs() ?>
        </div>
    </header>

    <div class="archive-content container">
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

    <h2>No content found</h2>

<?php endif; ?>

<?php
get_footer();
