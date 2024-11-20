<?php
/**
 * The template for displaying product content
 *
 * @package     Aral_Distribution
 * @since       Aral Distribution 1.0
 */


$product_description       = get_field( 'description' ) ?? '';
$product_short_description = get_field( 'short_description' ) ?? '';
$product_sku               = get_field( 'sku' ) ?? '';
$add_attributes            = get_field( 'add_attributes' ) ?? '';

$product_type = get_field( 'product_type' ) ?? '';
$attributes   = [
	'country'          => [ 'name' => 'Country', 'value' => get_field( 'country' )->name ?? '' ],
	'manufacturer'     => [ 'name' => 'Manufacturer', 'value' => get_field( 'manufacturer' ) ],
	'brand'            => [ 'name' => 'Brand', 'value' => get_field( 'brand' )->name ?? '' ],
	'bottle_size'      => [ 'name' => 'Bottle Size', 'value' => get_field( 'bottle_size' ) ],
	'bottles_per_case' => [ 'name' => 'Bottles per case', 'value' => get_field( 'bottles_per_case' ) ],
	'alcohol'          => [ 'name' => 'Alcohol', 'value' => get_field( 'alcohol_volume' ) ],
];

if ( $product_type === 'wine' ) {
	$attributes['color'] = [ 'name' => 'Color', 'value' => get_field( 'color' ) ];
	$attributes['type']  = [ 'name' => 'Type', 'value' => get_field( 'type' ) ];
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
    <div class="product-card">
		<?php if ( has_post_thumbnail() ): ?>
            <span class="product-card__overlay has-background-dim-10 has-background-dim"></span>
			<?php the_post_thumbnail( 'aral-product-featured-image', [ 'class' => 'product-card__image' ] ); ?>
		<?php endif; ?>

        <div class="product-card__header">
			<?php the_title( '<h3 class="product-card__title">', '</h3>' ); ?>
        </div>

        <div class="product-card__body">
            <ul class="product-attributes">
				<?php if ( ! empty( $product_sku ) ): ?>
                    <li class="product-attributes__item">
                            <span class="product-attributes__label">
                                <?php esc_html_e( 'SKU', 'aral-distribution' ); ?>
                            </span>
                        <span class="product-attributes__divider"></span>
                        <span class="product-attributes__value"><?php echo esc_html( $product_sku ) ?></span>
                    </li>
				<?php endif; ?>
				
				<?php if ( $attributes ): ?>
					<?php foreach ( $attributes as $attribute ): ?>
						
						<?php
						$attribute_name  = $attribute['name'] ?? '';
						$attribute_value = $attribute['value'] ?? '';
						
						if ( empty( $attribute_name ) || empty( $attribute_value ) ) {
							continue;
						}
						?>
                        <li class="product-attributes__item">
                            <span class="product-attributes__label"><?php echo esc_html( $attribute_name ); ?></span>
                            <span class="product-attributes__divider"></span>
                            <span class="product-attributes__value"><?php echo esc_html( $attribute_value ); ?></span>
                        </li>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if ( $add_attributes ): ?>
					<?php foreach ( $add_attributes as $attribute ): ?>
						<?php
						$attribute_name  = $attribute['name'] ?? '';
						$attribute_value = $attribute['value'] ?? '';
						
						if ( empty( $attribute_name ) || empty( $attribute_value ) ) {
							continue;
						}
						?>
                        <li class="product-attributes__item">
                            <span class="product-attributes__label"><?php echo esc_html( $attribute_name ); ?></span>
                            <span class="product-attributes__divider"></span>
                            <span class="product-attributes__value"><?php echo esc_html( $attribute_value ); ?></span>
                        </li>
					<?php endforeach; ?>
				<?php endif; ?>
            </ul>
        </div>

        <div class="product-card__footer"></div>
    </div>

</div><!-- #post-<?php the_ID(); ?> -->

