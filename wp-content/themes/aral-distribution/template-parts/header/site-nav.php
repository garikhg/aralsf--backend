<?php
/**
 * Displays the site navigation.
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

$primary_nav_menu = wp_nav_menu( array(
	'theme_location'  => 'primary',
	'container_class' => 'primary-menu-container hidden lg:block',
	'menu_id'         => 'primary-menu',
	'menu_class'      => 'primary-menu flex w-full flex-wrap items-center justify-between',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'fallback_cb'     => false,
	'echo'            => false,
) );

if ( ! $primary_nav_menu ) {
	return;
}
?>

<nav class="flex w-full flex-wrap items-center justify-between">
    <div class="container flex w-full flex-wrap items-center justify-between">
		<?php get_template_part( 'template-parts/header/brand-logo' ) ?>

        <div class="menu-toggle-container lg:hidden flex items-center">
            <button class="menu-toggle"
                    type="button"
                    data-twe-offcanvas-toggle
                    data-twe-target="#offcanvasExample"
                    aria-controls="offcanvasExample"
                    data-twe-ripple-init
                    data-twe-ripple-color="light"
            >
                <span class="[&>svg]:w-7 [&>svg]:stroke-black/50 dark:[&>svg]:stroke-neutral-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"/>
                    </svg>
               </span>
                <span class="sr-only">Open Menu</span>
            </button>
        </div>
		
		<?php echo $primary_nav_menu ?>
    </div>
</nav>
