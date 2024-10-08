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
$id = 'block-brand-carousel-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-brand-carousel';
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

if ( ! $brands ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $className ) ?>">
	<div class="swiper block-brand-carousel__swiper">
		<div class="swiper-wrapper block-brand-carousel__wrapper">
			<?php foreach ( $brands as $brand ): ?>
				<?php
				$brand_logo = get_field( 'brand_logo', $brand );
				?>
				<div class="swiper-slide block-brand-carousel__slide">
					<div class="block-brand-carousel__content">
						<?php if ( $brand_logo ): ?>
							<?php
							$logo_classes = 'block-brand-carousel__logo';
							echo wp_get_attachment_image( $brand_logo['id'],
								'medium',
								false,
								array( 'class' => $logo_classes )
							);
							?>

						<?php endif; ?>
						<span class="sr-only"><?php echo esc_html( $brand->name ); ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
