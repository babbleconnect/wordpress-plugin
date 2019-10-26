<?php

// Register settings
function Bblr_register_settings()
{
  register_setting( 'Bblr_settings_group', 'Bblr_settings' );
}
add_action( 'admin_init', 'Bblr_register_settings' );

// Delete options on uninstall
function Bblr_uninstall()
{
  delete_option( 'Bblr_settings' );
}
register_uninstall_hook( __FILE__, 'Bblr_uninstall' );


?>
