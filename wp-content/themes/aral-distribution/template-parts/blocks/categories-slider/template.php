<?php
/**
 * Block Name: Categories Slider
 *
 * Need help converting block HTML markup to an array?
 * https://happyprime.github.io/wphtml-converter/
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-templates/
 * @link https://www.advancedcustomfields.com/resources/acf-blocks-using-innerblocks-and-parent-child-relationships/
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'categories-slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-categories-slider';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}
$className .= ' bg-primary text-primary-foreground';

$categories = get_terms( array(
	'taxonomy'   => 'product_cat',
	'hide_empty' => false,
	'parent'     => 0,
) );

$slide_loop         = get_field( 'slide_loop' ) ? 'true' : 'false';
$autoplay           = get_field( 'autoplay' ) ? 'true' : 'false';
$display_pagination = get_field( 'display_pagination' );
$slide_speed        = intval( get_field( 'slide_speed' ) ) ? : 2000;
?>
<section
        id="<?php echo esc_attr( $id ); ?>"
        class="<?php echo esc_attr( $className ); ?>"
        data-slide-loop="<?php echo esc_attr( $slide_loop ); ?>"
        data-slide-autoplay="<?php echo esc_attr( $autoplay ); ?>"
        data-slide-speed="<?php echo esc_attr( $slide_speed ); ?>"
>
	<?php if ( $categories ): ?>
        <div class="categories-slider swiper">
            <div class="swiper-wrapper">
				<?php foreach ( $categories as $category ): ?>
					<?php
					$image     = get_field( 'thumbnail', $category ) ?? '';
					$image_url = $image['url'] ?? '';
					
					if ( ! $image_url || $category->slug === 'all-products'
					     || $category->slug === 'uncategorized'
					) {
						continue;
					}
					?>
                    <div class="swiper-slide relative flex">
                        <div class="swiper-slide-content w-full h-full absolute top-0 left-0 flex flex-col justify-center z-10">
                            <div class="container">
                                <div class="flex flex-wrap -mx-8">
                                    <div class="w-full text-center sm:text-start sm:w-1/2 lg:w-1/2 xl:max-w-screen-sm px-8">
                                        <h3 class="scroll-m-20 heading">
											<?php echo $category->name; ?>
                                        </h3>

                                        <div class="mt-6 text-lg font-light">
											<?php echo category_description( $category ); ?>
                                        </div>

                                        <div class="mt-8">
                                            <a href="<?php echo get_term_link( $category->term_id ); ?>"
                                               class="btn-link inline-block relative uppercase text-sm after:absolute after:bottom-0 after:left-0 after:h-px after:bg-white after:w-full after:rounded-full after:transition-all after:duration-200 hover:after:w-0 hover:after:bg-primary"
                                            >
                                                View Products
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .container -->
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-1/2 sm:pl-8 lg:pl-8 sm:ml-auto">
                            <div class="relative">
                                <img src="<?php echo $image_url; ?>"
                                     class="block w-full h-[540px] lg:h-[620px] max-w-full object-cover object-center"
                                     alt="<?php echo $category->name; ?>"
                                >
                                <div class="w-full h-full bg-gradient-to-t from-black/60 to-transparent absolute top-0 left-0 md:hidden"></div>
                            </div>
                        </div>
                    </div><!-- .swiper-slide -->
				<?php endforeach; ?>
            </div>
			
			<?php if ( $display_pagination ): ?>
                <div class="categories-pagination__wrap bg-yellow-500 absolute bottom-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full z-10">
                    <div class="categories-pagination"></div>
                </div>
			<?php endif; ?>
        </div><!-- .categories-carousel -->
	<?php endif; ?>
</section>
