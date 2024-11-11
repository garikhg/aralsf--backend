<?php

get_header();
?>
    <section class="relative">
        <div class="hero-slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative text-white">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/demo-slide1.jpg' ?>"
                         class="block w-full h-[calc(100vh_-_80px)] object-cover object-center"
                         alt="Murfatlar Collection"
                    >
                    <div class="swiper-slide__contains flex flex-col justify-center w-full h-full absolute top-0 left-0 z-10">
                        <div class="container">
                            <div class="max-w-xl text-center md:text-start">
                                <h2 class="swiper-slide__title text-4xl md:text-5xl lg:text-7xl font-heading"
                                    data-swiper-parallax="-400"
                                >
                                    Premium Spirits Delivered
                                </h2>
                                <div class="swiper-slide__description text-lg font-light space-y-12 mt-6"
                                     data-swiper-parallax="-500"
                                >
                                    <p>
                                        Since 2001, weve been bridging European alcohol culture with Northern
                                        California.
                                    </p>

                                    <a href="/product-category/all-products/"
                                       class="btn-primary inline-block text-sm uppercase bg-primary rounded-full hover:text-primary hover:bg-yellow-500 transition-all duration-200 py-4 px-8"
                                    >
                                        View Products
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/murfatlar-1-web.webp' ?>"
                         class="block w-full h-[calc(100vh_-_80px)] object-cover object-center"
                         alt="Murfatlar Collection"
                    >
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/murfatlar-2-web.webp' ?>"
                         class="block w-full h-[calc(100vh_-_80px)] object-cover object-center"
                         alt="Murfatlar Collection"
                    >
                </div>
            </div>

            <div class="bg-gradient-to-t from-black/30 to-transparent hero-pagination"></div>
        </div>
    </section>

    <section class="relative bg-[#f8f8f8]">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/demo/banner11.jpg' ?>"
             class="block absolute top-0 bottom-0 left-0 w-full h-full object-cover object-center"
             alt=""
        >
        <div class="w-full h-full py-8 sm:py-8 lg:py-56">
            <div class="container h-full flex flex-col justify-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-8 lg:gap-8 z-10">
                    <div class="col-start-2">
                        <h2 class="scroll-m-20 text-primary font-heading text-5xl">
                            Welcome to Aral Distributions
                        </h2>
                        <div class="mt-6 text-lg font-light">
                            <p>
                                Since 2001, weve been bridging European alcohol culture with Northern California.
                                Representing over 50 top brands, including Nemiroff, we are your trusted partner in
                                wholesale distribution. Experience excellence with our dedicated team and 12 years
                                of expertise.
                            </p>

                            <div class="mt-8">
                                <a href="/about-us"
                                   class="btn-link relative uppercase text-sm after:absolute after:bottom-0 after:left-0 after:h-px after:bg-black after:w-full after:rounded-full after:transition-all after:duration-200 hover:after:w-0 hover:after:bg-primary"
                                >
                                    About Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary text-primary-foreground">
		<?php $categories = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'parent'     => 0,
		) ); ?>
		
		<?php if ( $categories ): ?>
            <div class="categories-slider swiper">
                <div class="swiper-wrapper">
					<?php foreach ( $categories as $category ): ?>
						<?php
						$image     = get_field( 'thumbnail', $category ) ?? '';
						$image_url = $image['url'] ?? '';
						
						if ( ! $image_url || $category->slug === 'all-products'
						     || $category->slug === 'uncategorized'
						) {
							continue;
						}
						?>
                        <div class="swiper-slide relative flex">
                            <div class="swiper-slide-content w-full h-full absolute top-0 left-0 flex flex-col justify-center z-10">
                                <div class="container">
                                    <div class="flex flex-wrap -mx-8">
                                        <div class="w-full sm:w-1/2 lg:w-1/2 xl:max-w-screen-sm px-8">
                                            <h3 class="text-5xl font-heading">
												<?php echo $category->name; ?>
                                            </h3>

                                            <div class="mt-6 text-lg font-light">
												<?php echo category_description( $category ); ?>
                                            </div>

                                            <div class="mt-8">
                                                <a href="<?php echo get_term_link( $category->term_id ); ?>"
                                                   class="btn-link inline-block relative uppercase text-sm after:absolute after:bottom-0 after:left-0 after:h-px after:bg-white after:w-full after:rounded-full after:transition-all after:duration-200 hover:after:w-0 hover:after:bg-primary"
                                                >
                                                    View Products
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .container -->
                            </div>
                            <div class="w-full sm:w-1/2 lg:w-1/2 sm:pl-8 lg:pl-8 sm:ml-auto">
                                <div class="relative">
                                    <img src="<?php echo $image_url; ?>"
                                         class="block w-full h-[540px] lg:h-[620px] max-w-full object-cover object-center"
                                         alt="<?php echo $category->name; ?>"
                                    >
                                    <div class="w-full h-full bg-gradient-to-t from-black/60 to-transparent absolute top-0 left-0 md:hidden"></div>
                                </div>
                            </div>
                        </div><!-- .swiper-slide -->
					<?php endforeach; ?>
                </div>

                <div class="categories-pagination__wrap bg-yellow-500 absolute bottom-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full z-10">
                    <div class="categories-pagination"></div>
                </div>
            </div><!-- .categories-carousel -->
		<?php endif; ?>
    </section>

    <!-- Brand Partners Carousel -->
    <section class="relative">
        <div class="container space-y-8 sm:space-y-16 py-16 xl:py-20">
            <h2 class="block-heading heading text-center text-2xl sm:text-3xl md:text-4xl">
                Our Partner
            </h2>
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
