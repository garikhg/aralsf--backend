<?php
/**
 * Displays the site colophon.
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

$bloginfo_name = get_bloginfo( 'name' );
$site_logo     = get_template_directory_uri() . '/assets/images/logo-new-w.svg';

$footer_menu_info = wp_nav_menu( array(
	'theme_location' => 'footer',
	'container'      => false,
	'menu_class'     => 'footer-links flex gap-4 lg:gap-8 font-light mx-auto mt-3 xl:mr-0 xl:mt-0',
	'menu_id'        => 'footer-links',
	'depth'          => 1,
	'fallback_cb'    => false,
	'echo'           => false,
) );

$footer_blocks = get_field( 'footerblocks', 'options' );

$footer_description = get_field( 'footer_description', 'options' ) ?? '';

$copyright = get_field( 'footer_copyright', 'option' ) ?? '';
$copyright = ! empty( $copyright ) ? str_replace( '{Y}', date_i18n( 'Y' ), $copyright ) : '';
?>
<div class="container py-8 lg:py-12 space-y-8 lg:space-y-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 lg:gap-8">
        <div class="col-span-2 sm:col-span-3 lg:col-span-2 flex items-center">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ) ?>"
                     class="footer-logo max-w-full min-w-20 w-20 h-auto mx-auto"
                     alt="<?php echo esc_attr( $bloginfo_name ); ?>"
                />
                <span class="sr-only"><?php echo esc_html( $bloginfo_name ); ?></span>
            </a>
			
			<?php if ( ! empty( $footer_description ) ): ?>
                <div class="footer-description text-sm leading-6 max-w-60 ml-4">
					<?php echo wp_kses_post( $footer_description ); ?>
                </div>
			<?php endif; ?>

        </div>
		
		<?php if ( $footer_blocks && is_array( $footer_blocks ) ): ?>
			<?php foreach ( $footer_blocks as $block ): ?>
                <div class="col-span-1 space-y-2">
					<?php if ( $block["title"] ): ?>
                        <h4 class="font-semibold uppercase text-sm">
							<?php echo $block["title"] ?>
                        </h4>
					<?php endif; ?>
                    <p class="text-white/90">
                        Valentin, Street Road 24, <br>
                        New York, USA – 67452
                    </p>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 items-center border-t border-white/30 pt-8">
        <div class="col-span-1">
			<?php if ( ! empty( $copyright ) ): ?>
                <div class="copyright font-light text-center xl:text-start">
					<?php echo wp_kses_post( $copyright ); ?>
                </div>
			<?php endif; ?>
        </div>

        <div class="col-span-1 flex justify-end">
			<?php echo $footer_menu_info; ?>
        </div>
    </div>
</div>

