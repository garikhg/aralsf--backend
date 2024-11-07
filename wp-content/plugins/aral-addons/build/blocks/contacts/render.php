<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 *
 * @var Array $attributes The block attributes.
 */

$text          = $attributes['text'] ?? '';
$title         = $attributes['title'] ?? '';
$address       = $attributes['address'] ?? '';
$phone         = $attributes['phone'] ?? '';
$email         = $attributes['email'] ?? '';
$working_hours = $attributes['workingHours'] ?? '';
$working_days  = $attributes['workingDays'] ?? '';
?>
<section <?php echo get_block_wrapper_attributes(); ?>>
	<div class="block-contact__inner-container is-layout-grid">
		<div class="block-contact__column">

			<div class="block-contact__heading">
				<?php if ( ! empty( $title ) ): ?>
					<h2 class="block-contact__title">
						<?php echo $title; ?>
					</h2>
				<?php endif; ?>

				<?php if ( ! empty( $text ) ): ?>
					<div class="block-contact__description">
						<p><?php echo wp_kses_post( $text ) ?></p>
					</div>
				<?php endif; ?>
			</div>

			<div class="block-contact__content">

				<div class="block-contact__addresses">
					<h4 class="block-contact__subtitle">Head Office:</h4>
					<?php if ( ! empty( $address ) ): ?>
						<div class="block-contact__address">
							<?php echo wp_kses_post( $address ) ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="block-contact__contacts">
					<h4 class="block-contact__subtitle">Contacts:</h4>
					<?php if ( ! empty( $phone ) ): ?>
						<div class="block-contact__phone">
							<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $email ) ): ?>
						<div class="block-contact__email">
							<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
						</div>
					<?php endif; ?>
				</div>

				<div class="block-contact__working-hours">
					<h4 class="block-contact__subtitle">Working hours:</h4>
					<?php if ( ! empty( $working_hours ) ): ?>
						<div class="block-contact__hours">
							<?php echo wp_kses_post( $working_hours ) ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $working_days ) ): ?>
						<div class="block-contact__days">
							<?php echo wp_kses_post( $working_days ) ?>
						</div>
					<?php endif; ?>
				</div>

			</div>

		</div>
		<div class="block-contact__column">
			<?php echo do_shortcode( '[contact-form-7 id="07e4264" title="Contact form 1"]' ) ?>
		</div>
	</div>


</section>
