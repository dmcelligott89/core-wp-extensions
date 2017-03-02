<?php
/**
 * Plugin Name: CMS Branding
 * Description: Uses Custom Branding for the WordPress CMS
 * Version: 1.0
 */

namespace DM\Admin\CMSBranding;


function website_core_login_styles() { ?>
	<style type="text/css">
		body { color: #4c4c4c; overflow:auto; }

		body.login div#login h1 a {
			background-image: url(<?php echo websiteCore::get_extension_url(); ?>assets/img/dm-login.png);
			background-position: center;
			background-size: contain;
			width: auto!important;
		}

		body.login { background: #4c4c4c; }

		#login { width: 420px; padding: 6%; }

		.login h1 {
			background: #fff;
			padding: 20px;
			border-radius: 6px 6px 0 0;
		}

		.login h1 a { margin-bottom: 0!important; }

		.login form {
			margin-top: 0;
			padding: 20px 75px;
			border:none;
			-webkit-box-shadow:none;
			box-shadow:none;
		}

		.login form label {
			color: #4c4c4c;
		}

		.login form .forgetmenot {
			float: none;
			text-align: center;
		}

		input[type=text], input[type=password] {
			color: #4C4C4C;
			border:1px solid #CCC;
			border-radius:6px;
			-webkit-box-shadow:none;
			box-shadow:none;
			background-color:#EDEDED!important;
			background: #EDEDED!important;
			font-size: 18px;
			padding: 4px!important;
		}

		input[type=text]:focus, input[type=password]:focus {
			border-color: #8C8C8C;
			-webkit-box-shadow: 0 0 2px rgba(76, 76, 76,.6);
			box-shadow: 0 0 2px rgba(76, 76, 76,.6);
		}

		.login #login p.submit { text-align: center; }
		.login #login .button-primary {
			float:none;
			height: 42px;
			font-size: 16px;
			line-height: 0;
			background-image: none;
			background: #4C4C4C;
			border: none;
			border-radius: 6px;
			text-shadow: none;
			box-shadow: none;
			width: 50%;
			margin-top: 20px;
		}

		.login .button-primary:hover {
			background: #2a2a2a;
			border: none;
			border-radius: 0;
			text-shadow: none;
			box-shadow: none;
		 }

		.login #backtoblog, .login #nav {
			background: #FFF;
			font-size: 12px;
			margin: 0;
			padding: 0 0 15px 0;
			text-align: center;
		}

		.login #backtoblog { border-radius: 0 0 6px 6px; }

		.login #backtoblog a, .login #nav a {
			color: #999;
		}

		.login #backtoblog a:hover, .login #nav a:hover {
			color: #4C4C4C;
		}

		.login .message {
			font-size: 14px;
			padding:15px 0;
			text-align:center;
			border-left: 6px solid #999;
			border-right: 6px solid #999;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\website_core_login_styles' );

function website_core_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\\website_core_login_logo_url' );

function website_core_login_logo_url_title() {
    return get_bloginfo();
}
add_filter( 'login_headertitle', __NAMESPACE__ . '\\website_core_login_logo_url_title' );



function website_core_admin_logo() {
    echo '<style type="text/css">
		#wp-admin-bar-wp-logo { background: url(' . websiteCore::get_extension_url() . 'assets/img/dm-icon.png) center center no-repeat !important; background-size: 80% auto !important; }
		#wp-admin-bar-wp-logo .ab-icon { visibility: hidden; }
    	#wpadminbar .ab-top-menu>li:hover>.ab-item { background-color: rgba(51,51,51, 0.5); }
    </style>';
}
add_action('admin_head', __NAMESPACE__ . '\\website_core_admin_logo');



function website_core_admin_footer_text () {
	echo '<img src="' . websiteCore::get_extension_url() . 'assets/img/dm-dashboard.png">';
}
add_filter('admin_footer_text', __NAMESPACE__ . '\\website_core_admin_footer_text');