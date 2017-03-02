<?php
/**
 * Plugin Name: Admin menu
 * Description: Modify the menu in administration area
 * Version: 1.0.0
 */

namespace DM\Admin\DisableAdminMenu;

function website_core_remove_menu_pages() {
  $user_id = get_current_user_id();
  //remove_menu_page('edit.php'); // Posts
  if ( !(defined('DOING_AJAX') && DOING_AJAX) && $user_id != 1 ) {
    remove_menu_page('plugins.php'); //Plugins
    remove_menu_page('tools.php'); //Tools
    remove_menu_page('edit.php?post_type=acf'); // Custom fields
    remove_submenu_page( 'index.php', 'update-core.php' ); // Admin menu updates
  }
}
add_action( 'admin_init', __NAMESPACE__ . '\\website_core_remove_menu_pages' );