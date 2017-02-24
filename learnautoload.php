<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @link              http://.tutsplus.com/tutorials/using-namespaces-and-autoloading-in-wordpress-plugins-part-1
 * @since             0.1.0
 * @package           learnautoload
 *
 * @wordpress-plugin
 * Plugin Name:       Learn Autoload
 * Plugin URI:        http://.tutsplus.com/tutorials/using-namespaces-and-autoloading-in-wordpress-plugins-part-1
 * Description:       Learn how to use Namespaces and Autoloading in WordPress.
 * Version:           0.2.0
 * Author:            Tom McFarlin
 * Author URI:        https://tommcfarlin.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the files for rendering the display.
include_once( 'admin/class-meta-box.php' );
include_once( 'admin/class-meta-box-display.php' );
include_once( 'admin/util/class-question-reader.php' );

// Include the files for loading the assets.
include_once( 'admin/util/interface-assets.php' );
include_once( 'admin/util/class-css-loader.php' );

add_action( 'add_meta_boxes', 'learnautoload' );
/**
 * Starts the plugin by initializing the meta box, its display, and then
 * sets the plugin in motion.
 */
function learnautoload() {

	$css_loader = new CSS_Loader();
	$css_loader->init();

	$meta_box = new Meta_Box(
		new Meta_Box_Display(
			new Question_Reader()
		)
	);
	$meta_box->init();
}
