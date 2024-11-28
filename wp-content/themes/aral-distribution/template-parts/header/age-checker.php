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

?>
<div id="age-verification"
     class="age-checker fixed top-0 left-0 w-full h-full bg-black backdrop-blur-md bg-opacity-90 z-50  items-center justify-center flex px-8"
>
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-20 z-10"></div>
    <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
        <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/videos/background2.mp4' ); ?>"
                type="video/mp4"
        >
        Your browser does not support the video tag.
    </video>
    <div class="relative w-full flex flex-col max-w-lg z-20">
        <div class="flex flex-col text-center mb-6 mx-auto">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-new-w.svg' ) ?>"
                 class="block w-36 h-auto mx-auto" alt="Aral Distributions Inc."
            />
            <span class="inline-block text-sm font-light text-white text-center tracking-widest mt-1">Aral Distributions Inc.</span>
        </div>

        <div class="age-checker__content bg-white p-8 w-full">
            <div class="text-center font-heading mb-4">
                <h2 class="age-checker__title text-2xl lg:text-3xl xl:text-4xl mb-1">
					<?php _e( 'Are You Over 21?', 'aral-distribution' ); ?>
                </h2>
                <p class="font-heading italic text-gray-600">
					<?php _e( 'By entering this site you agree to our Privacy Policy.', 'aral-distribution' ); ?>
                </p>
                <p class="mt-4 font-heading">
                    To access the Aral Distributions website, you must confirm that you are 21 years of age or older. By
                    entering, you acknowledge that you have read and agree to our Privacy Policy. Please drink
                    responsibly.
                </p>
            </div>

            <form class="age-checker__form max-w-[306px] flex flex-col items-center justify-center space-y-4 mb-4 mx-auto">
                <div class="relative space-y-2">
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
                    <label for="remember" class="text-sm uppercase font-light">Remember me</label>
                </div>
            </form>
        </div>
    </div>
</div>
