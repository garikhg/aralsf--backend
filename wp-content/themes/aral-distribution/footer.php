<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

$site_name = get_bloginfo( 'name' );
$site_logo = get_template_directory_uri() . '/assets/images/logo-new-w.svg';

$footer_menu_info = wp_nav_menu( array(
	'theme_location' => 'footer',
	'container'      => false,
	'menu_class'     => 'footer-menu font-light',
	'menu_id'        => 'footer-menu',
	'depth'          => 1,
	'fallback_cb'    => false,
	'echo'           => false,
) );

$footer_menu_cat = wp_nav_menu( array(
	'theme_location' => 'footer_categories',
	'container'      => false,
	'menu_class'     => 'footer-menu font-light',
	'menu_id'        => 'footer-menu',
	'depth'          => 1,
	'fallback_cb'    => false,
	'echo'           => false,
) );

$contact_blocks = get_field( 'contact_blocks', 'options' );

$footer_description = get_field( 'footer_description', 'options' ) ?? '';

$copyright = get_field( 'footer_copyright', 'option' ) ?? '';
$copyright = ! empty( $copyright ) ? str_replace( '{Y}', date_i18n( 'Y' ), $copyright ) : '';
?>
</main><!-- #main -->
</div><!--#primary-->
</div><!-- #content -->

<footer class="w-full bg-primary text-primary-foreground mt-auto">
    <div class="container py-8 lg:py-16 space-y-8 lg:space-y-16">

        <div class="flex flex-wrap space-y-8 lg:space-y-0">
            <div class="hidden lg:block footer-column w-full lg:w-1/4">
                <div class="space-y-4 lg:space-y-8">
					<?php get_template_part( 'template-parts/header/brand-logo' ) ?>
					
					<?php if ( ! empty( $footer_description ) ): ?>
                        <div class="footer-description font-light xl:pr-16">
							<?php echo wp_kses_post( $footer_description ); ?>
                        </div>
					<?php endif; ?>
                </div>
            </div>

            <div class="footer-column w-full lg:w-3/4">

                <div class="flex flex-wrap justify-end space-y-8 md:space-y-0 lg:space-x-24 -mx-4">
                    <div class="footer-block w-full md:w-1/3 lg:w-auto px-4">
						<?php if ( $footer_menu_info ): ?>
                            <h5 class="footer-block__title">
								<?php echo wp_get_nav_menu_name( 'footer' ); ?>
                            </h5>
							<?php echo $footer_menu_info; ?>
						<?php endif; ?>
                    </div>
                    <div class="footer-block w-full md:w-1/3 lg:w-auto px-4">
						<?php if ( $footer_menu_cat ): ?>
                            <h5 class="footer-block__title">
								<?php echo wp_get_nav_menu_name( 'footer_categories' ); ?>
                            </h5>
							<?php echo $footer_menu_cat; ?>
						<?php endif; ?>
                    </div>
                    <div class="footer-block w-full md:w-1/3 lg:w-auto px-4 space-y-8">
						<?php if ( $contact_blocks ): ?>
							<?php foreach ( $contact_blocks as $block ): ?>
                                <div class="footer-block__contact">
									<?php if ( ! empty( $block['title'] ) ): ?>
                                        <h5 class="footer-block__title"><?php echo $block['title']; ?></h5>
									<?php endif; ?>
									<?php if ( ! empty( $block['text'] ) ) {
										echo wp_kses_post( $block['text'] );
									} ?>
                                </div>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 items-center border-t border-white/30 pt-8">
            <div class="col-span-1">
				<?php if ( ! empty( $copyright ) ): ?>
                    <div class="font-light text-center md:text-start">
						<?php echo wp_kses_post( $copyright ); ?>
                    </div>
				<?php endif; ?>
            </div>

            <div class="col-span-1"></div>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
