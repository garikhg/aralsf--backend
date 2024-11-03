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
$id = 'block-contact-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-contact';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Global
$title       = get_field( 'title' ) ?? '';
$description = get_field( 'description' ) ?? '';

// Addresses
$addresses        = get_field( 'addresses' ) ?? '';
$street_addresses = $addresses['addresses'] ?? '';

// Contacts
$contacts        = get_field( 'contacts' ) ?? '';
$contact_details = $contacts['contact_details'] ?? '';


// Working Hours
$working_hours = get_field( 'working_hours' ) ?? '';
$hours         = $working_hours['hours'] ?? '';

?>

<div class="<?php echo esc_attr( $className ) ?>">
	<div class="block-contact__header">
		<?php if ( ! empty( $title ) ): ?>
			<h3 class="block-contact__heading">
				<?php echo $title ?>
			</h3>
		<?php endif; ?>

		<?php if ( ! empty( $description ) ): ?>
			<div class="block-contact__description">
				<?php echo wp_kses_post( $description ); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="block-contact__content">
		<?php if ( 0 < count( $addresses ) ): ?>
			<div class="block-contact__addresses">
				<?php if ( ! empty( $addresses['title'] ) ): ?>
					<h5 class="block-contact__item-title">
						<?php echo $addresses['title']; ?>
					</h5>
				<?php endif; ?>

				<?php if ( 0 < count( $street_addresses ) ): ?>
					<div class="block-contact__item-list">
						<?php foreach ( $street_addresses as $address ): ?>
							<div class="block-contact__item-info">
								<?php echo wp_kses_post( $address['street'] ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; // endif Addresses ?>

		<?php if ( 0 < count( $contacts ) ): ?>
			<div class="block-contact__contacts">
				<?php if ( ! empty( $contacts['title'] ) ): ?>
					<h5 class="block-contact__item-title">
						<?php echo $contacts['title']; ?>
					</h5>
				<?php endif; ?>

				<?php if ( 0 < count( $contact_details ) ): ?>
					<div class="block-contact__item-list">
						<?php foreach ( $contact_details as $contact ): ?>
							<div class="block-contact__item-info">
								<?php echo $contact['label']; ?>
								<?php echo $contact['contact']; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; // endif Contacts ?>

		<?php if ( 0 < count( $working_hours ) ): ?>
			<div class="block-contact__working-hours">
				<?php if ( ! empty( $working_hours['title'] ) ): ?>
					<h5 class="block-contact__item-title">
						<?php echo $working_hours['title']; ?>
					</h5>
				<?php endif; ?>

				<?php if ( 0 < count( $hours ) ): ?>
					<div class="block-contact__item-list">
						<?php foreach ( $hours as $hour ): ?>
							<div class="block-contact__item-info">
								<?php echo $hour['hours']; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; // endif Working Hours ?>
	</div>

</div>
