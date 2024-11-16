<?php
/**
 * Block Name: Media and Text
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
$id = 'hero-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-slider';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$sliders = get_field( 'sliders' ) ?? [];
?>
<div class="<?php echo esc_attr( $className ) ?>">
	<?php if ( is_array( $sliders ) && 0 < count( $sliders ) ): ?>
        <div class="hero-slider swiper">
            <div class="swiper-wrapper">
				
				<?php foreach ( $sliders as $slider ): ?>
                    <div class="swiper-slide relative text-white">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/demo-slide1.jpg' ?>"
                             class="block w-full h-[calc(100vh_-_80px)] object-cover object-center"
                             alt="Murfatlar Collection"
                        >
                        <div class="swiper-slide__contains flex flex-col justify-center w-full h-full absolute top-0 left-0 z-10">
                            <div class="container">
                                <div class="max-w-xl text-center md:text-start">
                                    <h2 class="swiper-slide__title text-4xl md:text-5xl lg:text-7xl font-heading"
                                        data-swiper-parallax="-400"
                                    >
                                        Premium Spirits Delivered
                                    </h2>
                                    <div class="swiper-slide__description text-lg font-light space-y-12 mt-6"
                                         data-swiper-parallax="-500"
                                    >
                                        <p>
                                            Since 2001, weve been bridging European alcohol culture with Northern
                                            California.
                                        </p>

                                        <a href="/product-category/all-products/"
                                           class="btn-primary inline-block text-sm uppercase bg-primary rounded-full hover:text-primary hover:bg-yellow-500 transition-all duration-200 py-4 px-8"
                                        >
                                            View Products
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>

            </div>

            <div class="bg-gradient-to-t from-black/30 to-transparent hero-pagination"></div>
        </div>
	<?php endif; ?>
</div>

