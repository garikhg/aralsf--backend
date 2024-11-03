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
$className = 'block-hero';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$featured_image = get_field( 'featured_image' ) ?? '';

$block_template = array(
	[
		'core/heading',
		[
			'level'       => 2,
			'placeholder' => 'Enter the heading...',
			'className'   => 'hero-heading',
		],
	],
	[
		'core/paragraph',
		[
			'placeholder' => 'Enter some content here...',
			'className'   => 'hero-description',
		],
	],
);
?>
<div class="page-hero<?php echo $featured_image['id'] ? ' has-hero-background' : '' ?>">
	<?php if ( ! empty( $featured_image['id'] ) ): ?>
        <span class="page-hero__background-overlay bg-gradient-to-t from-black/40 to-transparent"></span>
		<?php echo wp_get_attachment_image( $featured_image['id'], 'full' ); ?>
	<?php endif; ?>

    <div class="page-hero__content">
        <div class="container max-w-screen-md">
            <InnerBlocks
                template="<?php echo esc_attr( wp_json_encode( $block_template ) ); ?>"
                templateLock="all"
            />
        </div>
    </div>
</div>
