<?php
/**
 * Displays the mobile menu.
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */

$primary_nav_menu = wp_nav_menu( array(
	'theme_location'  => 'primary',
	'container_class' => 'primary-menu-container',
	'menu_id'         => 'primary-mobile-menu',
	'menu_class'      => 'primary-mobile-menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'fallback_cb'     => false,
	'echo'            => false,
) );

if ( ! $primary_nav_menu ) {
	return;
}
?>
<div
        class="invisible fixed bottom-0 left-0 top-0 z-[1045] flex w-96 max-w-full -translate-x-full flex-col border-none bg-white bg-clip-padding text-neutral-700 shadow-sm outline-none transition duration-300 ease-in-out data-[twe-offcanvas-show]:transform-none dark:bg-body-dark dark:text-white"
        tabindex="-1"
        id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel"
        data-twe-offcanvas-init
>
    <div class="flex items-center justify-between p-4">
        <h5 class="mb-0 leading-normal" id="offcanvasExampleLabel">
			<?php esc_html_e( 'Menu', 'aral-distribution' ); ?>
        </h5>
        <button type="button"
                class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                data-twe-offcanvas-dismiss
                aria-label="Close"
        ><span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></span>
        </button>
    </div>
    <div class="flex-grow overflow-y-auto p-4">
		<?php echo $primary_nav_menu; ?>
    </div>
</div>
