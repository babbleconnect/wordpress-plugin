<?php

// Create a option page for settings
add_action('admin_menu', 'add_bblr_option_page');

// Add top-level admin bar link
add_action('admin_bar_menu', 'add_bblr_link_to_admin_bar', 999);

// Adds BabbleConnect link to top-level admin bar
function add_bblr_link_to_admin_bar()
{
  global $wp_version;
  global $wp_admin_bar;

  $bblr_icon = '<img style="height:1.4rem;" src="' . BBLR_5daa266658535_PATH . '/images/bblr-icon-teal.svg">';

  $args = array(
    'id' => 'bblr-admin-menu',
    'title' => '<span class="ab-icon" ' . ($wp_version < 3.8 && !is_plugin_active('mp6/mp6.php') ? ' style="margin-top: 3px;"' : '') . '>' . $bblr_icon . '</span><span class="ab-label">BabbleConnect</span>',
    'parent' => FALSE,   // set parent to false to make it a top level (parent) node
    'href' => get_bloginfo('wpurl') . '/wp-admin/admin.php?page=menus.php',
    'meta' => array('title' => 'BabbleConnect')
  );

  $wp_admin_bar->add_node($args);
}

// Hook in the options page functionå
function add_bblr_option_page()
{
  add_options_page('BabbleConnect Options', 'BabbleConnect', 'activate_plugins', basename(__FILE__), 'bblr_options_page');
}

?>
