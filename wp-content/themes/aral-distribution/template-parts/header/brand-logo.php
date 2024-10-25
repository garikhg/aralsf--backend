<?php
/**
 * The template for displaying the brand logo
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

$brand_logo = get_template_directory_uri() . '/assets/images/logo-new-w.svg';
$site_name = get_bloginfo( 'name' );
?>

<div class="site-logo">
	<?php if ( has_custom_logo() ): ?>
		<?php the_custom_logo(); ?>
	<?php else: ?>
		<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
			<img src="<?php echo esc_url( $brand_logo ) ?>"
			     alt="<?php echo esc_attr( $site_name ) ?>"
			>
		</a>
	<?php endif; ?>
</div>
