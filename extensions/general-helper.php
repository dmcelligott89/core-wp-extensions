<?php
/**
 * Plugin Name: General Helper Functions
 * Description: 
 * Version: 0.0.1
 */

namespace DM\Helper;

/**
 * Extended var_dump to format the output using pre tags
 *
 * @param mixed $var                  Mixed variable to dump.
 * @param string $conditional_var     GET variable to be present to show the output. Leave blank to alway show.
 */

function dump( $var, $conditional_var = '' ) {
	if ( empty( $conditional_var ) || isset( $_GET[ $conditional_var ] ) ) {
		echo "<pre>";
		var_dump( $var );
		echo "</pre>";
	}
}

/**
 * Return a post object for the first occurrence of a named page template or false if not found
 *
 * @param string $template_name       Required template name.
 */

function get_page_by_template( $template_name ) {
	$args = array(
		'posts_per_page' => 1,
		'post_type'      => 'page',
		'orderby'        => 'post_title',
		'order'          => 'ASC',
		'meta_key'       => '_wp_page_template',
		'meta_value'     => $template_name
	);

	$pages = get_posts( $args );

	return ( count( $pages ) ) ? $pages[0] : false;
}
