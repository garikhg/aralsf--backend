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
$id = 'brand-partners-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-brand-partners';
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

$heading = get_field( 'block_heading' )
?>

<section class="<?php echo esc_attr( $className ) ?>">
	<?php if ( ! empty( $heading ) ): ?>
        <h2 class="block-heading heading heading-3 text-center">
			<?php echo esc_html( $heading ); ?>
        </h2>
	<?php endif; ?>

    <div class="flex flex-wrap justify-center items-center -mx-2 -mt-2 sm:-mx-4 sm:-mt-4 lg:-mx-8 lg:-mt-8">
		<?php foreach ( $brands as $brand ): ?>
			<?php
			$brand_logo = get_field( 'brand_logo', $brand );
			?>
            <div class="w-full text-center sm:w-1/2 md:w-1/3 lg:w-1/6 px-2 sm:px-4 mt-2 sm:mt-4 lg:px-8 lg:mt-8">
				<?php echo wp_get_attachment_image( $brand_logo['ID'] ); ?>
                <span class="sr-only"><?php echo esc_html( $brand->name ); ?></span>
            </div>
		<?php endforeach; ?>
    </div>
</section>
