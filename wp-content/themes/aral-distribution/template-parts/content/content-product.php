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
$product_attributes        = get_field( 'product_attributes' ) ?? '';
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
			<?php if ( ! empty( $product_attributes ) || ! empty( $product_sku ) ): ?>
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
					
					<?php if ( is_array( $product_attributes ) && 0 < count( $product_attributes ) ): ?>
						<?php foreach ( $product_attributes as $attribute ): ?>
							<?php
							$attribute_name  = $attribute['name']->name ?? '';
							$attribute_value = $attribute['value'] ?? '';
							?>
							<?php if ( ! empty( $attribute_name ) && ! empty( $attribute_value ) ): ?>
                                <li class="product-attributes__item">
                                    <span class="product-attributes__label"><?php echo esc_html( $attribute_name ); ?></span>
                                    <span class="product-attributes__divider"></span>
                                    <span class="product-attributes__value"><?php echo esc_html( $attribute_value ); ?></span>
                                </li>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
                </ul>
			<?php endif; ?>
        </div>

        <div class="product-card__footer"></div>
    </div>

</div><!-- #post-<?php the_ID(); ?> -->

