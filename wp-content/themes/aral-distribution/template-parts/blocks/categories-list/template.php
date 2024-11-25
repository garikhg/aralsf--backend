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
$id = 'categories-list-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'categories-list';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$categories = get_terms( array(
	'taxonomy'   => 'product_cat',
	'hide_empty' => false,
	'exclude'    => array(
		get_term_by( 'slug', 'all-products', 'product_cat' )->term_id ?? '',
		get_term_by( 'slug', 'uncategory', 'product_cat' )->term_id ?? '',
	),
) );

if ( ! $categories || is_wp_error( $categories ) ) {
	return;
}
?>

<section class="<?php echo esc_attr( $className ) ?>">
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
		<?php foreach ( $categories as $category ): ?>
			<?php
			$category_thumbnail = get_field( 'thumbnail', 'product_cat_' . $category->term_id );
			if ( ! $category_thumbnail ) {
				continue;
			}
			?>
            <div class="col-span-1 relative rounded overflow-hidden">
                <span class="block absolute w-full h-full bg-gradient-to-t from-black/40 to-transparent rounded"></span>
                <img src="<?php echo $category_thumbnail['url']; ?>"
                     alt="<?php echo $category_thumbnail['alt']; ?>"
                     class="block w-full h-full object-cover rounded"
                >
                <div class="absolute text-white w-full bottom-0 left-0 p-8 z-20">

                    <h3 class="text-3xl lg:text-4xl font-heading font-medium mb-2">
						<?php echo $category->name; ?>
                    </h3>
					
					<?php if ( ! empty( $category->description ) ) {
						echo term_description( $category );
					} ?>

                    <div class="mt-6 sm:mt-8">
                        <a href="<?php echo get_term_link( $category ); ?>"
                           class="relative inline-block decoration-none text-[13px] uppercase leading-normal after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-px after:bg-[currentColor] after:transition-all after:duration-300 after:ease-in-out after:transform after:scale-x-0 after:origin-left hover:after:scale-x-100"
                        >
                            <span><?php esc_html_e( 'View Products', 'aral-distribution' ); ?></span>
                        </a>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</section>
