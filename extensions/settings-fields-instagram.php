<?php
/**
 * Plugin Name: Settings Fields - Instagram
 * Description: Inserts settings fields for storing Instagram credentials
 * Version: 1.0.0
 */

namespace DM\Settings\Instagram;

function settings_api_init() {
	// Add the settings section
	add_settings_section(
		'website_instagram_settings_section',
		'Instagram Details',
		__NAMESPACE__ . '\\instagram_settings_section_callback_function',
		'general'
	);

	// Add settings fields
	add_settings_field(
		'instagram_access_token',
		'Access Token',
		__NAMESPACE__ . '\\access_token_callback_function',
		'general',
		'website_instagram_settings_section'
	);
	register_setting( 'general', 'instagram_access_token' );

	add_settings_field(
		'instagram_user_id',
		'User ID',
		__NAMESPACE__ . '\\user_id_callback_function',
		'general',
		'website_instagram_settings_section'
	);
	register_setting( 'general', 'instagram_user_id' );

}
add_action( 'admin_init', __NAMESPACE__ . '\\settings_api_init' );

function instagram_settings_section_callback_function() {
	echo '<p>Enter your Instagram details below:</p>';
}

function access_token_callback_function() {
	echo '<input name="instagram_access_token" type="text" id="instagram_access_token" value="' . get_option('instagram_access_token') . '" class="regular-text">';
}

function user_id_callback_function() {
	echo '<input name="instagram_user_id" type="text" id="instagram_user_id" value="' . get_option('instagram_user_id') . '" class="regular-text">';
}
