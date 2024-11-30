<?php

/**
 * Template Name: Home Page
 *
 * @package Aral Distribution
 * @since   Aral Distribution 1.0
 */

get_header();

$sliders = get_field( 'sliders' );
?>
<?php if ( $sliders ): ?>
    <div class="slider swiper">
        <div class="swiper-wrapper">
			<?php foreach ( $sliders as $slider ): ?>
				<?php
				$slide_image_uri = $slider['slide']['url'] ?? '';
				if ( ! $slide_image_uri ) {
					continue;
				}
				
				$title    = $slider['title'] ?? '';
				$subtitle = $slider['subtitle'] ?? '';
				$button   = $slider['button'] ?? '';
				?>

                <div class="swiper-slide relative text-white">
                    <img src="<?php echo esc_attr( $slide_image_uri ) ?>"
                         class="block w-full h-[calc(72vh_-_64px)] lg:h-[calc(100vh_-_80px)] object-cover object-center"
                         alt="Murfatlar Collection"
                    >
					<?php if ( ! empty( $title ) || ! empty( $subtitle ) ): ?>
                        <div class="swiper-slide__contains flex flex-col justify-center w-full h-full absolute top-0 left-0 z-10">
                            <div class="container">
                                <div class="max-w-xl text-center md:text-start">
									<?php if ( ! empty( $title ) ): ?>
                                        <h2 class="swiper-slide__title text-4xl md:text-5xl lg:text-7xl font-heading"
                                            data-swiper-parallax="-400"
                                        >
											<?php echo $title; ?>
                                        </h2>
									<?php endif; ?>
                                    <div class="swiper-slide__description text-lg font-light space-y-12 mt-6"
                                         data-swiper-parallax="-500"
                                    >
										<?php if ( ! empty( $subtitle ) ): ?>
											<?php echo wp_kses_post( $subtitle ); ?>
										<?php endif; ?>
										
										<?php if ( ! empty( $button['url'] ) && ! empty( $button['title'] ) ): ?>
                                            <a href="<?php echo esc_url( $button['url'] ) ?>"
												<?php echo $button['target'] ? 'target="' . $button['target'] . '"'
													: ''; ?>
                                               class="btn-primary inline-block text-sm uppercase bg-primary rounded-full hover:text-primary hover:bg-yellow-500 transition-all duration-200 py-4 px-8"
                                            >
												<?php echo $button['title']; ?>
                                            </a>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
			<?php endforeach; ?>
        </div>
        <div class="bg-gradient-to-t from-black/30 to-transparent hero-pagination"></div>
    </div>
<?php endif; ?>

<?php the_content(); ?>

    

    <!-- Brand Partners Carousel -->
    <section class="brand-partners relative">
        <div class="container space-y-8 sm:space-y-16 py-16 xl:py-20">
            <h3 class="scroll-m-20 heading heading-3 text-center">
                Our Partner
            </h3>
            <div class="brand-partners-carousel swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand1.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand2.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand3.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand4.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand5.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand6.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="w-full text-center border-y border-gray-200 p-8">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/brand7.png' ?>"
                                 class="block w-28 h-full object-contain max-w-full mx-auto"
                                 alt="Brand Partner"
                            >
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
