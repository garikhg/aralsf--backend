<?php
/**
 * Block Name: Media and Text
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-media-and-text-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-media-text';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$image      = '';
$media_type = get_field( 'media_type' ) ?? '';
$image_id   = get_field( 'media' ) ?? '';
if ( $image_id ) {
	$media_classes = '';
	if ( $media_type ) {
		$media_classes .= 'block-media-text__image-background';
	} else {
		$media_classes .= 'block-media-text__image';
	}

	$media_classes .= ' image-' . $image_id;

	$image = wp_get_attachment_image( $image_id, 'full', false, array( 'class' => esc_attr( $media_classes ) ) );
}
?>
<section class="<?php echo esc_attr( $className ) ?>">
	<?php if ( $media_type && ! empty( $image_id ) ) {
		echo $image;
	} ?>

	<div class="block-media-text__inner-container">
		<div class="block-columns block-columns-1 block-columns-lg-2">
			<div class="col-span-1">
				<?php if ( ! $media_type && ! empty( $image_id ) ) {
					echo $image;
				} ?>
			</div>
			<div class="col-span-1">
				<h4 class="block-heading">
					<?php echo get_field( 'title' ); ?>
				</h4>
				<div class="block-media-and-text__content space-y-4">
					<?php echo wp_kses_post( get_field( 'text' ) ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
