<?php
/**
 * Gutenberg Shortlink Panel plugin.
 *
 * @package   FlorianBrinkmann\GutenbergShortlinkPanel
 * @license   GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name: Gutenberg Shortlink Panel
 * Version:     1.0.0
 * Author:      Florian Brinkmann
 * Author URI:  https://florianbrinkmann.com/en/
 * License:     GPL v3 https://www.gnu.org/licenses/gpl-3.0
 * Text Domain: gutenberg-shortlink-panel
 */

namespace FlorianBrinkmann\GutenbergShortlinkPanel;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register editor script.
 */
add_action( 'init', function() {
	// Load dependencies and version info.
	$asset_info = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php' );

	wp_register_script(
		'gutenberg-shortlink-panel-editor-script',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_info['dependencies'],
		$asset_info['version']
	);
} );

/**
 * Enqueue editor script.
 */
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_script( 'gutenberg-shortlink-panel-editor-script' );

	wp_localize_script( 'gutenberg-shortlink-panel-editor-script', 'gspes', [
		'shortlink' => wp_get_shortlink(),
	] );
} );
