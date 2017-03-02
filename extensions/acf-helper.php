<?php
/**
 * Plugin Name: ACF Helper Functions
 * Description: Currently only contains a function to retrieve an ACF image URL based on a specified size, add more as necessary and update this description
 * Version: 1.0.0
 */

namespace DM\Helper\ACF;

/**
 * Retrieve an image URL for a specific size based on an ACF image field.
 *
 * @param array $image_array    ACF field image array.
 * @param string $size          Image size to return URL for.
 * @return string               URL for required image size. Original image URL if image size does not exist.
 */

function get_image_url( $image_array, $size = 'large' ) {
	$image_url = '';

	if ( array_key_exists( 'sizes', $image_array ) && array_key_exists( $size, $image_array['sizes'] ) ) {
		$image_url = $image_array['sizes'][ $size ];
	} else {
		$image_url = $image_array['url'];
	}

	return $image_url;
}
