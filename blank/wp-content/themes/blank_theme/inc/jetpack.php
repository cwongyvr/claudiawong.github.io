<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package silva
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function silva_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'silva_jetpack_setup' );
