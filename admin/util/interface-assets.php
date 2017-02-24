<?php
/**
 * Defines a common set of functions that any class responsible for loading
 * stylesheets, JavaScript, or other assets should implement.
 *
 * @package           learnautoload
 */

/**
 * Defines a common set of functions that any class responsible for loading
 * stylesheets, JavaScript, or other assets should implement.
 */
interface Assets_Interface {

	/**
	 * Should have an init function.
	 */
	public function init();

	/**
	 * Should have an enqueue function.
	 */
	public function enqueue();

}
