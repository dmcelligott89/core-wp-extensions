<?php
/**
 * Plugin Name: Settings Fields - Twitter
 * Description: Inserts settings fields for storing Twitter credentials
 * Version: 1.0.0
 */

namespace DM\Settings\Twitter;

function settings_api_init() {
	// Add the settings section
	add_settings_section(
		'twitter_settings_section',
		'Twitter Details',
		__NAMESPACE__ . '\\settings_section_callback_function',
		'general'
	);

	// Add settings fields
	add_settings_field(
		'twitter_consumer_key',
		'Consumer Key (API Key)',
		__NAMESPACE__ . '\\consumer_key_callback_function',
		'general',
		'twitter_settings_section'
	);
	register_setting( 'general', 'twitter_consumer_key' );

	add_settings_field(
		'twitter_consumer_secret',
		'Consumer Secret (API Secret)',
		__NAMESPACE__ . '\\consumer_secret_callback_function',
		'general',
		'twitter_settings_section'
	);
	register_setting( 'general', 'twitter_consumer_secret' );

	add_settings_field(
		'twitter_access_token',
		'Access Token',
		__NAMESPACE__ . '\\access_token_callback_function',
		'general',
		'twitter_settings_section'
	);
	register_setting( 'general', 'twitter_access_token' );

	add_settings_field(
		'twitter_access_token_secret',
		'Access Token Secret',
		__NAMESPACE__ . '\\access_token_secret_callback_function',
		'general',
		'twitter_settings_section'
	);
	register_setting( 'general', 'twitter_access_token_secret' );
}
add_action( 'admin_init', __NAMESPACE__ . '\\settings_api_init' );

function settings_section_callback_function() {
	echo '<p>Enter your Twitter details below:</p>';
}

function consumer_key_callback_function() {
	echo '<input name="twitter_consumer_key" type="text" id="twitter_consumer_key" value="' . get_option('twitter_consumer_key') . '" class="regular-text">';
}

function consumer_secret_callback_function() {
	echo '<input name="twitter_consumer_secret" type="text" id="twitter_consumer_secret" value="' . get_option('twitter_consumer_secret') . '" class="regular-text">';
}

function access_token_callback_function() {
	echo '<input name="twitter_access_token" type="text" id="twitter_access_token" value="' . get_option('twitter_access_token') . '" class="regular-text">';
}

function access_token_secret_callback_function() {
	echo '<input name="twitter_access_token_secret" type="text" id="twitter_access_token_secret" value="' . get_option('twitter_access_token_secret') . '" class="regular-text">';
}
