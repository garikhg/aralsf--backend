<?php
/**
 * Brands Carousel Block Template.
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'brand-partners-carousel-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-brand-partners brand-partners relative';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$brands = get_terms( array(
	'taxonomy'   => 'brand',
	'hide_empty' => false,
) );

$heading = get_field( 'block_heading' ) ?? '';
?>

<section class="<?php echo esc_attr( $className ) ?>">
    <div class="container space-y-8 sm:space-y-16 py-16 xl:py-20">
		
		<?php if ( ! empty( $heading ) ): ?>
            <h3 class="scroll-m-20 heading heading-3 text-center">
				<?php echo $heading; ?>
            </h3>
		<?php endif; ?>

        <div class="brand-partners-carousel swiper">
            <div class="swiper-wrapper">
				<?php if ( is_array( $brands ) && 0 < count( $brands ) ): ?>
					<?php foreach ( $brands as $brand ): ?>
						<?php
						$brand_logo    = get_field( 'brand_logo', 'term_' . $brand->term_id );
						$brand_logo_id = $brand_logo['ID'] ?? '';
						if ( ! $brand_logo ) {
							continue;
						}
						?>
                        <div class="swiper-slide">
                            <div class="w-full text-center border-y border-gray-200 p-6">
								<?php
								echo wp_get_attachment_image( $brand_logo['id'],
									'medium',
									false,
									array( 'class' => 'block w-28 h-full object-contain max-w-full mx-auto' )
								);
								?>
                                <span class="sr-only"><?php echo esc_html( $brand->name ); ?></span>
                            </div>
                        </div>
					<?php endforeach; ?>
				<?php endif; ?>
            </div>
            
            
        </div>
    </div>
</section>
