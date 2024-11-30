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

$title      = get_field( 'title' ) ?? '';
$text       = get_field( 'text' ) ?? '';
$media_type = get_field( 'media_type' ) ?? '';
$image_id   = get_field( 'media' ) ?? '';
$link       = get_field( 'link' ) ?? '';
?>
<section class="<?php echo esc_attr( $className ) ?> relative bg-[#f8f8f8]">
	<?php if ( ! empty( $image_id ) ) {
		$media_classes = 'hidden lg:block absolute top-0 bottom-0 left-0 w-full h-full object-cover object-center';
		echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => esc_attr( $media_classes ) ) );
	} ?>
    <div class="w-full h-full py-20 md:py-32 lg:py-56">
        <div class="container h-full flex flex-col justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-8 lg:gap-8 z-10">
                <div class="sm:col-start-2 text-center lg:text-start">
					<?php if ( ! empty( $title ) ): ?>
                        <h2 class="scroll-m-20 heading"><?php echo $title; ?></h2>
					<?php endif; ?>
                    <div class="mt-6 lg:text-lg font-light">
						<?php if ( ! empty( $text ) ) {
							echo wp_kses_post( $text );
						} ?>
						
						<?php if ( ! empty( $link['url'] ) ): ?>
                            <div class="mt-8">
                                <a href="<?php echo $link['url']; ?>"
									<?php echo $link['target'] ? 'target="' . $link['target'] . '"' : ''; ?>
                                   class="btn-link relative uppercase text-sm after:absolute after:bottom-0 after:left-0 after:h-px after:bg-black after:w-full after:rounded-full after:transition-all after:duration-200 hover:after:w-0 hover:after:bg-primary"
                                >
									<?php echo $link['title']; ?>
                                </a>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
