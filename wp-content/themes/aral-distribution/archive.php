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
    <header class="page-header">
        <div class="page-header__container container">
            <div class="page-header__inner-container">
                <h1 class="page-title">
					<?php the_archive_title(); ?>
                </h1>
				<?php if ( ! empty( $archive_description ) ): ?>
                    <div class="page-description">
						<?php the_archive_description(); ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </header>

    <div class="page-content__wrapper container">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
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
