<?php
/**
 * Block Name: Media and Text
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post-ID this block is saved to.
 *
 * @link https://github.com/AdvancedCustomFields/schemas/blob/main/json/block.json
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-text-editor-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-text-editor';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$text    = get_field( 'text' );
$columns = get_field( 'columns' );
$gap     = get_field( 'gap' );
$title   = get_field( 'title' );

if ( $columns ) {
	$className .= ' column-count-' . $columns;
}

if ( $gap ) {
	$className .= ' column-gap-' . $gap;
}

?>
<?php if ( ! empty( $title ) ): ?>
    <h2 class="heading">
		<?php echo $title; ?>
    </h2>
<?php endif; ?>

<div class="<?php echo esc_attr( $className ) ?>"
     style=" column-gap:<?php echo esc_attr( $gap ) ?>px"
>
	<?php if ( ! empty( $text ) ): ?>
		<?php echo wp_kses_post( $text ); ?>
	<?php endif; ?>
</div>
