<?php
/**
 * Provides a consistent way to enqueue all administrative-related stylesheets.
 *
 * @package           learnautoload
 */

/**
 * Provides a consistent way to enqueue all administrative-related stylesheets.
 *
 * Implements the Assets_Interface by defining the init function and the
 * enqueue function.
 *
 * The first is responsible for hooking up the enqueue
 * callback to the proper WordPress hook. The second is responsible for
 * actually registering and enqueuing the file.
 *
 * @implements Assets_Interface
 * @since      0.2.0
 */
class CSS_Loader implements Assets_Interface {

	/**
	 * Registers the 'enqueue' function with the proper WordPress hook for
	 * registering stylesheets.
	 */
	public function init() {

		add_action(
			'admin_enqueue_scripts',
			array( $this, 'enqueue' )
		);

	}

	/**
	 * Defines the functionality responsible for loading the file.
	 */
	public function enqueue() {

		wp_enqueue_style(
			'learnautoload',
			plugins_url( 'assets/css/admin.css', dirname( __FILE__ ) ),
			array(),
			filemtime( plugin_dir_path( dirname( __FILE__ ) ) . 'assets/css/admin.css' )
		);

	}
}
