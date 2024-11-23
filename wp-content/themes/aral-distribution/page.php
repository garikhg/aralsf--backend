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

$page_banner      = get_field( 'page_banner' );
$page_description = get_field( 'description' );
?>
<?php if ( $page_banner ): ?>
    <header class="page-header page-banner relative">
        <span class="page-banner__overlay absolute top-0 left-0 h-full w-full bg-gradient-to-t from-black/40 to-transparent"></span>
        <img src="<?php echo esc_url( $page_banner['url'] ); ?>"
             alt="<?php echo esc_attr( $page_banner['alt'] ); ?>"
             class="page-banner__image w-full h-[calc(72vh_-_64px)] min-h-72 object-cover object-center"
        >
        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center z-10">
            <div class="container max-w-screen-sm text-center text-white">
                <h1 class="page-banner__title text-6xl lg:text-7xl font-heading uppercase"><?php the_title(); ?></h1>
                <div class="page-banner__description text-lg lg:text-xl font-light mt-4">
					<?php echo wp_kses_post( $page_description ); ?>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>

<?php aral_distribution_the_breadcrumbs(); ?>

<div class="page-content">
	<?php the_content(); ?>
</div>

<?php get_footer(); ?>

