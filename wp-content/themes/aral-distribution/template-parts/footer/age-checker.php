<?php
/**
 * Displays the age checker
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( age_verification() ) {
	return;
}

$title            = get_field( 'age_title', 'options' ) ?? '';
$sitetitle        = get_bloginfo( 'name' ) ?? '';
$subtitle         = get_field( 'age_subtitle', 'options' ) ?? '';
$description      = get_field( 'age_description', 'options' ) ?? '';
$background_image = get_field( 'age_background', 'options' ) ?? '';
?>
<div id="age-verification"
     class="age-checker fixed top-0 left-0 w-full h-full bg-black backdrop-blur-md bg-opacity-90 z-50  items-center justify-center flex px-8"
>
	<?php if ( ! empty( $background_image['url'] ) ): ?>
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black/80 to-transparent z-10"></div>
        <img src="<?php echo esc_url( $background_image['url'] ); ?>"
             class="absolute top-0 left-0 w-full h-full object-cover z-0"
             alt="<?php echo esc_attr( $background_image['alt'] ); ?>"
        />
	<?php endif; ?>
    <div class="relative w-full flex flex-col max-w-lg z-20">
        <div class="flex flex-col text-center -mb-16 mx-auto z-10 bg-white p-2.5 rounded-t-full">
			<?php if ( has_custom_logo() ): ?>
				<?php the_custom_logo(); ?>
			<?php else: ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ) ?>"
                     class="custom-logo"
                     alt="<?php echo esc_attr( $sitetitle ); ?>"
                />
			<?php endif; ?>
			<?php if ( ! empty( $sitetitle ) ): ?>
                <span class="sr-only"><?php echo esc_html( $sitetitle ); ?></span>
			<?php endif; ?>
        </div>

        <div class="age-checker__content w-full bg-white shadow-lg rounded-xl p-8 pt-16">
            <div class="text-center font-heading mb-4">
				<?php if ( ! empty( $title ) ): ?>
                    <h2 class="age-checker__title text-2xl lg:text-3xl xl:text-4xl mb-1">
						<?php echo $title; ?>
                    </h2>
				<?php endif; ?>
				
				<?php if ( ! empty( $subtitle ) ): ?>
                    <p class="font-heading italic text-gray-600">
						<?php echo $subtitle; ?>
                    </p>
				<?php endif; ?>
				
				<?php if ( ! empty( $description ) ): ?>
                    <div class="mt-4 font-heading">
						<?php echo wp_kses_post( $description ); ?>
                    </div>
				<?php endif; ?>
            </div>

            <form class="age-checker__form max-w-[306px] flex flex-col items-center justify-center space-y-4 mb-4 mx-auto">
                <div class="relative w-full space-y-2">
                    <div class="w-full flex flex-col sm:flex-row gap-4">
                        <div class="form-floating">
                            <input required
                                   type="text"
                                   id="day"
                                   name="day"
                                   class="form-control age-checker__day"
                                   placeholder="<?php esc_attr_e( 'Day', 'aral-distribution' ); ?>"
                            >
                            <label for="day"><?php _e( 'Day', 'aral-distribution' ); ?></label>
                        </div>
                        <div class="form-floating">
                            <input required
                                   type="text"
                                   id="month"
                                   name="month"
                                   class="form-control age-checker__month"
                                   placeholder="<?php esc_attr_e( 'Month', 'aral-distribution' ); ?>"
                            >
                            <label for="month"><?php _e( 'Month', 'aral-distribution' ); ?></label>
                        </div>
                        <div class="form-floating">
                            <input required
                                   type="text"
                                   id="year"
                                   name="year"
                                   class="form-control age-checker__year"
                                   placeholder="<?php esc_attr_e( 'Year', 'aral-distribution' ); ?>"
                            >
                            <label for="year"><?php _e( 'Year', 'aral-distribution' ); ?></label>
                        </div>
                    </div>
                    <span class="age-checker__error error-message text-red-500 text-xs font-light hidden">
                        <?php _e( 'Please enter a valid date.', 'aral-distribution' ); ?>
                    </span>
                </div>
                <button
                        type="submit"
                        class="inline-block w-full rounded bg-primary px-8 pb-3 pt-3.5 text-xs font-medium uppercase leading-normal text-primary-foreground transition duration-150 ease-in-out hover:bg-primary-80 focus:bg-primary-80 focus:outline-none focus:ring-0 active:bg-primary-80 motion-reduce:transition-none"
                        data-twe-ripple-init
                >
					<?php _e( 'Enter', 'aral-distribution' ); ?>
                </button>
                <div class="age-checker__rememberme flex items-center justify-center gap-2">
                    <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                    >
                    <label for="remember" class="text-sm uppercase font-light">
						<?php _e( 'Remember me', 'aral-distribution' ); ?>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
