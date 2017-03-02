<?php
/**
 * Plugin Name: Disable Page Access
 * Description: Disables front-end access to the <strong>Author</strong>, <strong>Attachment</strong>, <strong>Day</strong> and <strong>Search</strong> pages. If the website needs front-end access to any of these sections, copy the code from this extension to your functions file and modify as necessary
 * Version: 1.0.0
 */

namespace DM\Frontend\DisablePageAccess;

function template_redirect() {
	global $wp_query, $post;

	$disable_page = false;
	if ( is_author() || is_attachment() || is_day() || is_search() ) {
		$disable_page = true;
	}

	if ( $disable_page ) {
		$wp_query->set_404();
	}

	if ( is_feed() ) {
		$author 	= get_query_var( 'author_name' );
		$attachment = get_query_var( 'attachment' );
		$attachment = ( empty( $attachment ) ) ? get_query_var( 'attachment_id' ) : $attachment;
		$day		= get_query_var('day');
		$search		= get_query_var('s');

		if ( !empty( $author ) || !empty( $attachment ) || !empty( $day ) || !empty( $search ) ) {
			$wp_query->set_404();
			$wp_query->is_feed = false;
		}
	}
}
add_action( 'template_redirect', __NAMESPACE__ . '\\template_redirect' );