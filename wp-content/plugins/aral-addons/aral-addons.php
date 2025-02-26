<?php
/**
 * Plugin Name:       Aral Addons
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.1-dev4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aral-addons
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_aral_addons_block_init() {
	register_block_type( __DIR__ . '/build/blocks/slider' );
	register_block_type( __DIR__ . '/build/blocks/text-editor' );
	register_block_type( __DIR__ . '/build/blocks/contacts' );
	register_block_type( __DIR__ . '/build/blocks/container' );
}

add_action( 'init', 'create_block_aral_addons_block_init' );
